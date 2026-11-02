<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Tests;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\TestCase;
use UnifyPort\Sdk\Exception\UnifyPortApiException;
use UnifyPort\Sdk\Generated\OperationCatalog;
use UnifyPort\Sdk\Generated\SchemaCatalog;
use UnifyPort\Sdk\OperationRequest;
use UnifyPort\Sdk\Tests\Support\QueueHttpClient;
use UnifyPort\Sdk\Tests\Support\SdkFactory;

final class ContractSyncTest extends TestCase
{
    public function testEveryOperationUsesItsDeclaredMethodAndEscapedPath(): void
    {
        // 全量检查能发现新增 resource 方法委托错位，响应使用离线数据避免触发真实写操作。
        foreach (OperationCatalog::all() as $id => $operation) {
            $path = [];
            $query = [];
            $expected = $operation->path;
            foreach ($operation->pathParameters as $parameter) {
                $path[$parameter['name']] = 'example/value';
                $expected = str_replace('{' . $parameter['name'] . '}', 'example%2Fvalue', $expected);
            }
            foreach ($operation->queryParameters as $parameter) {
                if ($parameter['required']) {
                    $query[$parameter['name']] = 'example';
                }
            }
            $http = new QueueHttpClient([new Response(200, [], '{"data":{}}')]);
            $client = SdkFactory::client($http);
            $client->$id(new OperationRequest(path: $path, query: $query, body: [], hasBody: true));
            self::assertSame($operation->method, $http->requests[0]->getMethod(), $id);
            self::assertSame($expected, $http->requests[0]->getUri()->getPath(), $id);
        }
    }

    public function testDeletePreservesAcceptedOperationAndLegacyNoContent(): void
    {
        $http = new QueueHttpClient([
            new Response(202, [], '{"data":{"operation_id":"op_example","kind":"DELETE","state":"PENDING"}}'),
            new Response(204),
        ]);
        $client = SdkFactory::client($http);
        $request = ['params' => ['path' => ['account_id' => 'acc_example']]];
        $accepted = $client->deleteAccount($request);
        self::assertNotNull($accepted->data);
        self::assertSame('PENDING', $accepted->data['data']['state']);
        self::assertNull($client->deleteAccount($request)->data);
    }

    public function testNumericErrorCodeIsOptionalAndStrictlyFiltered(): void
    {
        // 元数据独立校验，错误类型或敏感字符串不能影响旧 code 与 requestId。
        foreach (['12345', null, 12345, '01234', '123456', 'abcde', '１２３４５', 'secret=value'] as $numeric) {
            $http = new QueueHttpClient([new Response(400, [], (string) json_encode([
                'request_id' => 'req_example', 'error' => ['code' => 'BAD_REQUEST', 'numeric_code' => $numeric],
            ]))]);
            try {
                SdkFactory::client($http)->getWorkspace();
                self::fail('Expected API error');
            } catch (UnifyPortApiException $error) {
                self::assertSame('BAD_REQUEST', $error->apiCode);
                self::assertSame('req_example', $error->requestId);
                self::assertSame($numeric === '12345' ? '12345' : null, $error->numericCode);
                self::assertStringNotContainsString('secret=value', $error->getMessage());
            }
        }
    }

    public function testTelegramReadTargetDoesNotRequireSenderId(): void
    {
        $http = new QueueHttpClient([new Response(200, [], '{"data":{}}')]);
        SdkFactory::client($http)->markConversationRead(new OperationRequest(
            path: ['account_id' => 'acc_example'],
            body: ['conversation_id' => 'conversation_example', 'up_to_message_id' => '12345'],
            hasBody: true,
        ));
        self::assertSame(
            '{"conversation_id":"conversation_example","up_to_message_id":"12345"}',
            (string) $http->requests[0]->getBody(),
        );
    }
    public function testCreationIdempotencyDoesNotEnableAutomaticRetry(): void
    {
        $http = new QueueHttpClient([new Response(503, [], '{"error":{"code":"wallet_unavailable"}}')]);
        try {
            SdkFactory::client($http)->createAccount([
                'body' => ['provider' => 'whatsapp', 'region' => 'example', 'auth_mode' => 'qrcode'],
                'headers' => ['Idempotency-Key' => 'idem_example'],
            ]);
            self::fail('Expected API error');
        } catch (UnifyPortApiException) {
            self::assertCount(1, $http->requests);
            self::assertSame('idem_example', $http->requests[0]->getHeaderLine('Idempotency-Key'));
        }
    }

    public function testPublicWebhookFixturesMatchTheStaticallyCheckedExamples(): void
    {
        $examples = json_decode((string) file_get_contents(__DIR__ . '/fixtures/webhook-examples.json'), true);
        self::assertIsArray($examples);
        self::assertCount(49, $examples);
        foreach ($examples as $index => $example) {
            self::assertIsArray($example);
            self::assertIsString($example['schema']);
            self::assertArrayHasKey($example['schema'], SchemaCatalog::all());
            $method = 'example' . $index;
            // 同一批公开 fixture 同时约束静态类型、字段值和时间精度，防止各语言样例漂移。
            self::assertEquals(
                self::normalizeTimestampFractions($example['body']),
                self::normalizeTimestampFractions(WebhookExamples::$method())
            );
        }
    }

    private static function normalizeTimestampFractions(mixed $value): mixed
    {
        if (is_array($value)) {
            return array_map(self::normalizeTimestampFractions(...), $value);
        }
        if (is_string($value)) {
            return preg_replace(['/\.0+Z$/', '/(\.\d*?[1-9])0+Z$/'], ['Z', '$1Z'], $value);
        }
        return $value;
    }
}
