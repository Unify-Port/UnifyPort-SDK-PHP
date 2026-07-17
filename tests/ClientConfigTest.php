<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Tests;

use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use UnifyPort\Sdk\ClientConfig;
use UnifyPort\Sdk\Exception\UnifyPortConfigurationException;
use UnifyPort\Sdk\RetryConfig;
use UnifyPort\Sdk\Tests\Support\QueueHttpClient;

final class ClientConfigTest extends TestCase
{
    /** @return iterable<string, array{string}> */
    public static function invalidBaseUrls(): iterable
    {
        yield 'relative' => ['/v1'];
        yield 'remote http' => ['http://device.example.com'];
        yield 'userinfo' => ['https://user:password@device.example.com'];
        yield 'query' => ['https://device.example.com?secret=value'];
        yield 'fragment' => ['https://device.example.com#fragment'];
        yield 'invalid loopback octet' => ['http://127.0.0.999'];
        yield 'host whitespace' => ['https:// device.example.com'];
        yield 'encoded host' => ['https://%65xample.com'];
        yield 'bracketed hostname' => ['https://[example.com]'];
        yield 'invalid ipv6' => ['https://[gggg::1]'];
        yield 'invalid https ipv4' => ['https://999.999.999.999'];
    }

    #[DataProvider('invalidBaseUrls')]
    public function testRejectsUnsafeBaseUrls(string $baseUrl): void
    {
        $this->expectException(UnifyPortConfigurationException::class);
        $this->config($baseUrl);
    }

    public function testAllowsExplicitLoopbackHttpAndNormalizesTrailingSlash(): void
    {
        $config = $this->config('http://127.0.0.1:8080/api/', true);
        self::assertSame('http://127.0.0.1:8080/api', $config->baseUrl);

        $normalized = $this->config('https://device.example.com/api/../v1/');
        self::assertSame('https://device.example.com/v1', $normalized->baseUrl);

        $ipv6 = $this->config('https://[::1]/api');
        self::assertSame('https://[::1]/api', $ipv6->baseUrl);
    }

    public function testRejectsInvalidLoopbackOctetEvenWithHttpOptIn(): void
    {
        $this->expectException(UnifyPortConfigurationException::class);
        $this->config('http://127.0.0.999', true);
    }

    public function testValidatesRetryAndResponseLimits(): void
    {
        $this->expectException(UnifyPortConfigurationException::class);
        new RetryConfig(maxRetries: 11);
    }

    public function testDefaultsMatchTheNodeBaseline(): void
    {
        $config = $this->config('https://device.example.com');

        self::assertSame(30_000, $config->timeoutMs);
        self::assertSame(8 * 1024 * 1024, $config->maxResponseBytes);
        self::assertSame(2, $config->retry->maxRetries);
        self::assertSame(200, $config->retry->baseDelayMs);
        self::assertSame(5_000, $config->retry->maxDelayMs);
    }

    private function config(string $baseUrl, bool $allowInsecureHttp = false): ClientConfig
    {
        $factory = new Psr17Factory();

        return new ClientConfig(
            baseUrl: $baseUrl,
            apiKey: 'test-key',
            httpClient: new QueueHttpClient([]),
            requestFactory: $factory,
            streamFactory: $factory,
            allowInsecureHttp: $allowInsecureHttp,
        );
    }
}
