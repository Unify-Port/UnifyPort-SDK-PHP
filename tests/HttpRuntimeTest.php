<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Tests;

use Nyholm\Psr7\Response;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use RuntimeException;
use UnifyPort\Sdk\ClientConfig;
use UnifyPort\Sdk\Exception\UnifyPortApiException;
use UnifyPort\Sdk\Exception\UnifyPortConfigurationException;
use UnifyPort\Sdk\Exception\UnifyPortNetworkException;
use UnifyPort\Sdk\Exception\UnifyPortResponseParseException;
use UnifyPort\Sdk\Exception\UnifyPortTimeoutException;
use UnifyPort\Sdk\OperationRequest;
use UnifyPort\Sdk\RequestExecutionOptions;
use UnifyPort\Sdk\RetryConfig;
use UnifyPort\Sdk\Tests\Support\QueueHttpClient;
use UnifyPort\Sdk\Tests\Support\SdkFactory;
use UnifyPort\Sdk\Tests\Support\TrackingStream;
use UnifyPort\Sdk\UnifyPortDeviceClient;

final class HttpRuntimeTest extends TestCase
{
    /** @return iterable<string, array{int}> */
    public static function retryableStatuses(): iterable
    {
        foreach ([408, 429, 502, 503, 504] as $status) {
            yield (string) $status => [$status];
        }
    }

    public function testBuildsAuthenticatedRequestAndParsesResponse(): void
    {
        $http = new QueueHttpClient([new Response(
            200,
            ['X-Request-Id' => 'req_header'],
            self::workspaceJson('42'),
        )]);
        $client = SdkFactory::client($http, baseUrl: 'https://device.example.com/api/');
        $result = $client->getWorkspace([
            'headers' => [
                'Authorization' => 'Bearer must-not-leak',
                'Cookie' => 'session=must-not-leak',
                'Host' => 'evil.example.com',
                'Content-Length' => '999',
                'X-Forwarded-For' => '203.0.113.10',
                'X-Api-Key' => 'untrusted-key',
                'X-Request-Id' => 'req_client',
            ],
        ]);

        self::assertSame(200, $result->status);
        self::assertSame('req_body', $result->requestId);
        self::assertSame(42, $result->data['data']['account_quota']);
        self::assertSame('https://device.example.com/api/v1/workspace', (string) $http->requests[0]->getUri());
        self::assertSame('test-api-key', $http->requests[0]->getHeaderLine('X-Api-Key'));
        self::assertFalse($http->requests[0]->hasHeader('Authorization'));
        self::assertFalse($http->requests[0]->hasHeader('Cookie'));
        self::assertSame('device.example.com', $http->requests[0]->getHeaderLine('Host'));
        self::assertFalse($http->requests[0]->hasHeader('Content-Length'));
        self::assertFalse($http->requests[0]->hasHeader('X-Forwarded-For'));
        self::assertFalse($http->requests[0]->hasHeader('Accept'));
        self::assertSame('req_client', $http->requests[0]->getHeaderLine('X-Request-Id'));
        self::assertGreaterThan(0, $http->timeouts[0]);
    }

    public function testSerializesPathQueryAndJsonBody(): void
    {
        $http = new QueueHttpClient([
            new Response(200, [], '{"data":{"items":[],"has_more":false}}'),
            new Response(200, [], '{"data":{"message_id":"msg_example","status":"queued"}}'),
        ]);
        $client = SdkFactory::client($http);
        $client->listContacts(['params' => [
            'path' => ['account_id' => 'acc/example'],
            'query' => ['limit' => 100, 'q' => 'Alice Example'],
        ]]);
        $client->sendMessage([
            'headers' => [
                'Accept' => 'application/vnd.example+json',
                'Content-Type' => 'application/vnd.example+json',
            ],
            'body' => [
                'account_id' => 'acc_example',
                'to' => ['id' => 'recipient_example', 'type' => 'user'],
                'message' => ['type' => 'text', 'text' => 'Hello from the test suite'],
            ],
        ]);

        self::assertSame(
            'https://device.example.com/v1/accounts/acc%2Fexample/contacts?limit=100&q=Alice%20Example',
            (string) $http->requests[0]->getUri(),
        );
        self::assertSame('application/vnd.example+json', $http->requests[1]->getHeaderLine('Accept'));
        self::assertSame('application/vnd.example+json', $http->requests[1]->getHeaderLine('Content-Type'));
        self::assertStringContainsString('recipient_example', (string) $http->requests[1]->getBody());
    }

    public function testRejectsUnknownOrMissingOperationInputBeforeTransport(): void
    {
        $http = new QueueHttpClient([]);
        $client = SdkFactory::client($http);

        foreach (
            [
                ['params' => ['path' => ['account_id' => 'acc_example', 'undeclared' => 'value']]],
                ['params' => ['path' => ['account_id' => 'acc_example'], 'query' => ['undeclared' => 'value']]],
            ] as $request
        ) {
            try {
                $client->getAccount(new OperationRequest(
                    path: $request['params']['path'],
                    query: $request['params']['query'] ?? [],
                ));
                self::fail('Expected configuration exception');
            } catch (UnifyPortConfigurationException) {
                self::assertCount(0, $http->requests);
            }
        }

        try {
            $client->updateWorkspace(new OperationRequest());
            self::fail('Expected required body exception');
        } catch (UnifyPortConfigurationException) {
            self::assertCount(0, $http->requests);
        }

        try {
            $client->getContact(new OperationRequest(path: ['account_id' => 'acc_example']));
            self::fail('Expected required query exception');
        } catch (UnifyPortConfigurationException) {
            self::assertCount(0, $http->requests);
        }
    }

    public function testPreservesUnsafeJsonIntegersAsStrings(): void
    {
        $tokens = [
            ['9007199254740993', '9007199254740993'],
            ['9007199254740993.0', '9007199254740993'],
            ['9.007199254740993e15', '9007199254740993'],
            ['-9007199254740993', '-9007199254740993'],
        ];
        foreach ($tokens as [$token, $expected]) {
            $http = new QueueHttpClient([new Response(200, [], self::workspaceJson($token))]);
            $result = SdkFactory::client($http)->getWorkspace();
            self::assertSame($expected, $result->data['data']['account_quota']);
        }

        $safe = new QueueHttpClient([new Response(200, [], self::workspaceJson('9007199254740991'))]);
        self::assertSame(9007199254740991, SdkFactory::client($safe)->getWorkspace()->data['data']['account_quota']);
    }

    public function testRejectsExtremeOrMalformedSuccessJsonWithoutLeakingBody(): void
    {
        $http = new QueueHttpClient([new Response(
            200,
            ['X-Request-Id' => 'req_parse'],
            '{"credential":"must-not-leak","value":1e1000000}',
        )]);

        try {
            SdkFactory::client($http)->getWorkspace();
            self::fail('Expected response parse exception');
        } catch (UnifyPortResponseParseException $exception) {
            self::assertSame(200, $exception->status);
            self::assertSame('req_parse', $exception->requestId);
            self::assertStringNotContainsString('must-not-leak', $exception->getMessage());
            self::assertNull($exception->getPrevious());
        }
    }

    public function testRetriesSafeReadsButNeverWrites(): void
    {
        $retry = new RetryConfig(baseDelayMs: 1, maxDelayMs: 1);
        $readHttp = new QueueHttpClient([
            new Response(503, [], '{"error":{"code":"TEMPORARY"}}'),
            new Response(200, [], self::workspaceJson('42')),
        ]);
        SdkFactory::client($readHttp, retry: $retry)->getWorkspace();
        self::assertCount(2, $readHttp->requests);

        $writeHttp = new QueueHttpClient([
            new Response(503, [], '{"error":{"code":"TEMPORARY","message":"must-not-leak"}}'),
            new Response(200, [], self::workspaceJson('42')),
        ]);
        try {
            SdkFactory::client($writeHttp, retry: $retry)->updateWorkspace([
                'body' => ['name' => 'Example', 'status' => 'active'],
            ]);
            self::fail('Expected API exception');
        } catch (UnifyPortApiException $exception) {
            self::assertSame('TEMPORARY', $exception->apiCode);
            self::assertSame(503, $exception->status);
            self::assertNull($exception->details);
            self::assertNull($exception->getPrevious());
        }
        self::assertCount(1, $writeHttp->requests);
    }

    #[DataProvider('retryableStatuses')]
    public function testRetriesEveryNodeRetryableStatus(int $status): void
    {
        $http = new QueueHttpClient([
            new Response($status, ['Retry-After' => '999'], '{"error":{"code":"TEMPORARY"}}'),
            new Response(200, [], self::workspaceJson('42')),
        ]);

        SdkFactory::client($http, retry: new RetryConfig(baseDelayMs: 1, maxDelayMs: 1))->getWorkspace();
        self::assertCount(2, $http->requests);
    }

    public function testExtremeRetryAfterIsClampedWithoutWarnings(): void
    {
        $http = new QueueHttpClient([
            new Response(429, ['Retry-After' => '1e100'], '{"error":{"code":"RATE_LIMITED"}}'),
            new Response(200, [], self::workspaceJson('42')),
        ]);
        set_error_handler(static function (int $severity, string $message): never {
            throw new \ErrorException($message, 0, $severity);
        });
        try {
            $result = SdkFactory::client(
                $http,
                retry: new RetryConfig(baseDelayMs: 1, maxDelayMs: 1),
            )->getWorkspace();
        } finally {
            restore_error_handler();
        }

        self::assertSame(200, $result->status);
        self::assertCount(2, $http->requests);
    }

    public function testDoesNotRetryUnlistedServerStatus(): void
    {
        $http = new QueueHttpClient([
            new Response(500, [], '{"error":{"code":"INTERNAL"}}'),
            new Response(200, [], self::workspaceJson('42')),
        ]);

        try {
            SdkFactory::client($http, retry: new RetryConfig(baseDelayMs: 1, maxDelayMs: 1))->getWorkspace();
            self::fail('Expected API exception');
        } catch (UnifyPortApiException $exception) {
            self::assertSame('INTERNAL', $exception->apiCode);
            self::assertCount(1, $http->requests);
        }
    }

    public function testPerCallRetryCanOnlyTightenAndCredentialResolvesOnce(): void
    {
        $keyCalls = 0;
        $http = new QueueHttpClient([
            new Response(503, [], '{"error":{"code":"TEMPORARY"}}'),
            new Response(503, [], '{"error":{"code":"TEMPORARY"}}'),
        ]);
        $client = SdkFactory::client(
            $http,
            apiKey: static function () use (&$keyCalls): string {
                ++$keyCalls;

                return 'rotating-test-key-' . $keyCalls;
            },
            retry: new RetryConfig(baseDelayMs: 1, maxDelayMs: 1),
        );

        try {
            $client->getWorkspace([], new RequestExecutionOptions(maxRetries: 1));
            self::fail('Expected API exception');
        } catch (UnifyPortApiException) {
            self::assertSame(1, $keyCalls);
            self::assertCount(2, $http->requests);
            self::assertSame(
                $http->requests[0]->getHeaderLine('X-Api-Key'),
                $http->requests[1]->getHeaderLine('X-Api-Key'),
            );
        }
    }

    public function testNormalizesNetworkFailureAndTimeout(): void
    {
        $network = new QueueHttpClient([new RuntimeException('credential=must-not-leak')]);
        try {
            SdkFactory::client($network)->getWorkspace([], new RequestExecutionOptions(retry: false));
            self::fail('Expected network exception');
        } catch (UnifyPortNetworkException $exception) {
            self::assertSame('https://device.example.com/v1/workspace', $exception->url);
            self::assertStringNotContainsString('must-not-leak', $exception->getMessage());
            self::assertNull($exception->getPrevious());
        }

        $slow = new QueueHttpClient([
            static function (): Response {
                usleep(10_000);

                return new Response(200, [], self::workspaceJson('42'));
            },
        ]);
        $this->expectException(UnifyPortTimeoutException::class);
        SdkFactory::client($slow, timeoutMs: 2)->getWorkspace();
    }

    public function testRejectsUnsafeCredentialValuesWithoutSendingARequest(): void
    {
        foreach (['   ', "test-key\r\nInjected: value"] as $credential) {
            $http = new QueueHttpClient([]);
            try {
                SdkFactory::client($http, apiKey: $credential)->getWorkspace();
                self::fail('Expected credential configuration exception');
            } catch (UnifyPortConfigurationException $exception) {
                self::assertStringNotContainsString($credential, $exception->getMessage());
                self::assertCount(0, $http->requests);
            }
        }
    }

    public function testAppliesTheOperationDeadlineToCredentialProvider(): void
    {
        $http = new QueueHttpClient([]);
        $client = SdkFactory::client(
            $http,
            apiKey: static function (): string {
                usleep(10_000);

                return 'late-test-key';
            },
            timeoutMs: 2,
        );

        try {
            $client->getWorkspace();
            self::fail('Expected credential provider timeout');
        } catch (UnifyPortTimeoutException $exception) {
            self::assertSame(2, $exception->timeoutMs);
            self::assertCount(0, $http->requests);
        }
    }

    public function testRejectsOversizedResponseAndSupportsEmptySuccess(): void
    {
        $stream = new TrackingStream((new Psr17Factory())->createStream(str_repeat('x', 17)));
        $oversized = new QueueHttpClient([new Response(200, ['X-Request-Id' => 'req_large'], $stream)]);
        try {
            SdkFactory::client($oversized, maxResponseBytes: 16)->getWorkspace();
            self::fail('Expected response size exception');
        } catch (UnifyPortResponseParseException $exception) {
            self::assertSame('req_large', $exception->requestId);
            self::assertTrue($stream->closed);
        }

        $empty = new QueueHttpClient([new Response(204)]);
        $result = SdkFactory::client($empty)->deleteAccount([
            'params' => ['path' => ['account_id' => 'acc_example']],
        ]);
        self::assertSame([null, 204], [$result->data, $result->status]);
    }

    public function testAcceptsExactResponseLimitAndFiltersDiagnostics(): void
    {
        $json = self::workspaceJson('42');
        $http = new QueueHttpClient([new Response(
            200,
            ['X-Request-Id' => 'invalid request id'],
            $json,
        )]);
        $result = SdkFactory::client($http, maxResponseBytes: strlen($json))->getWorkspace();

        // body 中通过 allowlist 的 request_id 优先，非法 header 不会进入公开结果。
        self::assertSame('req_body', $result->requestId);
        self::assertSame($json, (string) $result->response->getBody());
    }

    public function testCapsJsonAfterUnsafeIntegerExpansion(): void
    {
        $json = substr(self::workspaceJson('42'), 0, -1)
            . ',"extra":[' . implode(',', array_fill(0, 20, '1e100')) . ']}';
        self::assertLessThan(1_024, strlen($json));

        $http = new QueueHttpClient([new Response(200, [], $json)]);
        $this->expectException(UnifyPortResponseParseException::class);
        SdkFactory::client($http, maxResponseBytes: 1_024)->getWorkspace();
    }

    public function testBoundsErrorDiagnosticsAndDropsSensitivePayload(): void
    {
        $body = json_encode([
            'request_id' => 'invalid request id',
            'error' => [
                'code' => str_repeat('A', 65),
                'message' => 'credential=must-not-leak',
                'details' => ['private' => 'must-not-leak'],
            ],
        ], JSON_THROW_ON_ERROR);
        $http = new QueueHttpClient([new Response(400, ['X-Request-Id' => 'also invalid'], $body)]);

        try {
            SdkFactory::client($http)->getWorkspace();
            self::fail('Expected bounded API exception');
        } catch (UnifyPortApiException $exception) {
            self::assertSame('HTTP_400', $exception->apiCode);
            self::assertNull($exception->requestId);
            self::assertNull($exception->details);
            self::assertStringNotContainsString('must-not-leak', $exception->getMessage());
            self::assertNull($exception->getPrevious());
        }
    }

    public function testRedactsThirdPartyFactoryExceptionsBeforeTransport(): void
    {
        $factory = new Psr17Factory();
        $streamFactory = new class implements StreamFactoryInterface {
            public function createStream(string $content = ''): StreamInterface
            {
                throw new RuntimeException('factory leaked: ' . $content);
            }

            public function createStreamFromFile(string $filename, string $mode = 'r'): StreamInterface
            {
                throw new RuntimeException('factory leaked filename: ' . $filename);
            }

            /** @param resource $resource */
            public function createStreamFromResource($resource): StreamInterface
            {
                throw new RuntimeException('factory leaked resource');
            }
        };
        $http = new QueueHttpClient([]);
        $client = new UnifyPortDeviceClient(new ClientConfig(
            baseUrl: 'https://device.example.com',
            apiKey: 'test-api-key',
            httpClient: $http,
            requestFactory: $factory,
            streamFactory: $streamFactory,
        ));

        try {
            $client->sendMessage(new OperationRequest(
                body: ['credential' => 'must-not-leak'],
                hasBody: true,
            ));
            self::fail('Expected normalized factory failure');
        } catch (UnifyPortNetworkException $exception) {
            self::assertStringNotContainsString('must-not-leak', $exception->getMessage());
            self::assertNull($exception->getPrevious());
            self::assertCount(0, $http->requests);
        }
    }

    public function testValidatesTheActualFactoryRequestBeforeInjectingCredential(): void
    {
        $factory = new Psr17Factory();
        foreach (
            [
                'https://attacker.example/collect',
                'https://device.example.com/api/../collect',
                'https://device.example.com/api/%2e%2e/collect',
            ] as $target
        ) {
            $requestFactory = new class ($factory, $target) implements RequestFactoryInterface {
                public ?RequestInterface $created = null;

                public function __construct(
                    private readonly Psr17Factory $factory,
                    private readonly string $target,
                ) {
                }

                /** @param UriInterface|string $uri */
                public function createRequest(string $method, $uri): RequestInterface
                {
                    $this->created = $this->factory->createRequest($method, $this->target);

                    return $this->created;
                }
            };
            $http = new QueueHttpClient([]);
            $client = new UnifyPortDeviceClient(new ClientConfig(
                baseUrl: 'https://device.example.com/api',
                apiKey: 'must-not-leak',
                httpClient: $http,
                requestFactory: $requestFactory,
                streamFactory: $factory,
            ));

            try {
                $client->getWorkspace();
                self::fail('Expected target confinement failure');
            } catch (UnifyPortConfigurationException) {
                self::assertNotNull($requestFactory->created);
                self::assertFalse($requestFactory->created->hasHeader('X-Api-Key'));
                self::assertCount(0, $http->requests);
            }
        }
    }

    public function testSanitizesHeadersPreloadedByTheRequestFactory(): void
    {
        $factory = new Psr17Factory();
        $requestFactory = new class ($factory) implements RequestFactoryInterface {
            public function __construct(private readonly Psr17Factory $factory)
            {
            }

            /** @param UriInterface|string $uri */
            public function createRequest(string $method, $uri): RequestInterface
            {
                return $this->factory
                    ->createRequest($method, 'https://device.example.com/api/v1/workspace')
                    ->withHeader('Host', 'attacker.example')
                    ->withHeader('Authorization', 'Bearer must-not-leak')
                    ->withHeader('Transfer-Encoding', 'chunked')
                    ->withHeader('X-Forwarded-Host', 'attacker.example');
            }
        };
        $http = new QueueHttpClient([new Response(200, [], self::workspaceJson('42'))]);
        $client = new UnifyPortDeviceClient(new ClientConfig(
            baseUrl: 'https://device.example.com/api',
            apiKey: 'test-api-key',
            httpClient: $http,
            requestFactory: $requestFactory,
            streamFactory: $factory,
        ));

        $client->getWorkspace();
        $request = $http->requests[0];
        self::assertSame('device.example.com', $request->getHeaderLine('Host'));
        self::assertSame('test-api-key', $request->getHeaderLine('X-Api-Key'));
        self::assertFalse($request->hasHeader('Authorization'));
        self::assertFalse($request->hasHeader('Transfer-Encoding'));
        self::assertFalse($request->hasHeader('X-Forwarded-Host'));
    }

    public function testResourceAccessorDelegatesToTheSameOperation(): void
    {
        $http = new QueueHttpClient([new Response(200, [], self::workspaceJson('42'))]);
        $result = SdkFactory::client($http)->workspace()->getWorkspace();

        self::assertSame(200, $result->status);
        self::assertSame('/v1/workspace', $http->requests[0]->getUri()->getPath());
    }

    private static function workspaceJson(string $quota): string
    {
        return sprintf(
            '{"request_id":"req_body","data":{"name":"Example Workspace","status":"active",'
            . '"account_quota":%s,"account_quota_unlimited":false}}',
            $quota,
        );
    }
}
