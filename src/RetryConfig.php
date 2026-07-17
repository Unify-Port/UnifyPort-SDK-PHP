<?php

declare(strict_types=1);

namespace UnifyPort\Sdk;

use UnifyPort\Sdk\Exception\UnifyPortConfigurationException;

final readonly class RetryConfig
{
    public const DEFAULT_MAX_RETRIES = 2;
    public const DEFAULT_BASE_DELAY_MS = 200;
    public const DEFAULT_MAX_DELAY_MS = 5_000;
    public const MAX_RETRIES = 10;

    public function __construct(
        public int $maxRetries = self::DEFAULT_MAX_RETRIES,
        public int $baseDelayMs = self::DEFAULT_BASE_DELAY_MS,
        public int $maxDelayMs = self::DEFAULT_MAX_DELAY_MS,
    ) {
        if ($this->maxRetries < 0 || $this->maxRetries > self::MAX_RETRIES) {
            throw new UnifyPortConfigurationException('retry.maxRetries 必须在 0 到 10 之间');
        }

        self::assertTimer($this->baseDelayMs, 'retry.baseDelayMs');
        self::assertTimer($this->maxDelayMs, 'retry.maxDelayMs');
    }

    private static function assertTimer(int $value, string $name): void
    {
        if ($value <= 0 || $value > ClientConfig::MAX_TIMER_MS) {
            throw new UnifyPortConfigurationException(
                sprintf('%s 必须是 1 到 %d 之间的整数', $name, ClientConfig::MAX_TIMER_MS),
            );
        }
    }
}
