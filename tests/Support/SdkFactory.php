<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Tests\Support;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Client\ClientInterface;
use UnifyPort\Sdk\ClientConfig;
use UnifyPort\Sdk\RetryConfig;
use UnifyPort\Sdk\UnifyPortDeviceClient;

final class SdkFactory
{
    /** @param string|callable(): string $apiKey */
    public static function client(
        ClientInterface $httpClient,
        string|callable $apiKey = 'test-api-key',
        string $baseUrl = 'https://device.example.com',
        int $timeoutMs = ClientConfig::DEFAULT_TIMEOUT_MS,
        int $maxResponseBytes = ClientConfig::DEFAULT_MAX_RESPONSE_BYTES,
        ?RetryConfig $retry = null,
        bool $allowInsecureHttp = false,
    ): UnifyPortDeviceClient {
        $factory = new Psr17Factory();

        return new UnifyPortDeviceClient(new ClientConfig(
            baseUrl: $baseUrl,
            apiKey: $apiKey,
            httpClient: $httpClient,
            requestFactory: $factory,
            streamFactory: $factory,
            timeoutMs: $timeoutMs,
            maxResponseBytes: $maxResponseBytes,
            retry: $retry,
            allowInsecureHttp: $allowInsecureHttp,
        ));
    }
}
