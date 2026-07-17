<?php

declare(strict_types=1);

namespace UnifyPort\Sdk;

use Closure;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use UnifyPort\Sdk\Exception\UnifyPortConfigurationException;
use UnifyPort\Sdk\Http\UrlGuard;

final class ClientConfig
{
    public const DEFAULT_TIMEOUT_MS = 30_000;
    public const DEFAULT_MAX_RESPONSE_BYTES = 8 * 1024 * 1024;
    public const MAX_RESPONSE_BYTES = 64 * 1024 * 1024;
    public const MAX_TIMER_MS = 2_147_483_647;

    public readonly string $baseUrl;
    public readonly RetryConfig $retry;

    /** @var string|Closure(): string */
    private readonly string|Closure $apiKey;

    /**
     * @param string|callable(): string $apiKey
     */
    public function __construct(
        string $baseUrl,
        string|callable $apiKey,
        public readonly ClientInterface $httpClient,
        public readonly RequestFactoryInterface $requestFactory,
        public readonly StreamFactoryInterface $streamFactory,
        public readonly int $timeoutMs = self::DEFAULT_TIMEOUT_MS,
        public readonly int $maxResponseBytes = self::DEFAULT_MAX_RESPONSE_BYTES,
        ?RetryConfig $retry = null,
        bool $allowInsecureHttp = false,
    ) {
        if (PHP_INT_SIZE < 8) {
            // 64-bit PHP 才能在不丢失 Node safe-integer 语义的前提下解析所有安全整数。
            throw new UnifyPortConfigurationException('UnifyPort SDK 需要 64-bit PHP runtime');
        }

        self::assertPositiveTimer($this->timeoutMs, 'timeoutMs');
        if ($this->maxResponseBytes <= 0 || $this->maxResponseBytes > self::MAX_RESPONSE_BYTES) {
            throw new UnifyPortConfigurationException(
                sprintf('maxResponseBytes 必须是 1 到 %d 之间的整数', self::MAX_RESPONSE_BYTES),
            );
        }

        $this->baseUrl = UrlGuard::normalizeBaseUrl($baseUrl, $allowInsecureHttp);
        $this->apiKey = is_string($apiKey) ? $apiKey : Closure::fromCallable($apiKey);
        $this->retry = $retry ?? new RetryConfig();
    }

    /** @internal credential 只应由 transport 在单次 operation 开始时解析。 */
    public function resolveApiKey(): string
    {
        $value = is_string($this->apiKey) ? $this->apiKey : ($this->apiKey)();

        if (trim($value) === '') {
            throw new UnifyPortConfigurationException('apiKey 不能为空');
        }
        if (str_contains($value, "\r") || str_contains($value, "\n")) {
            throw new UnifyPortConfigurationException('apiKey 包含不允许的 header 字符');
        }

        return $value;
    }

    private static function assertPositiveTimer(int $value, string $name): void
    {
        if ($value <= 0 || $value > self::MAX_TIMER_MS) {
            throw new UnifyPortConfigurationException(
                sprintf('%s 必须是 1 到 %d 之间的整数', $name, self::MAX_TIMER_MS),
            );
        }
    }
}
