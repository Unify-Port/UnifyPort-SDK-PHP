<?php

declare(strict_types=1);

namespace UnifyPort\Sdk;

use UnifyPort\Sdk\Exception\UnifyPortConfigurationException;

final readonly class RequestExecutionOptions
{
    public function __construct(
        public ?int $timeoutMs = null,
        public bool $retry = true,
        public ?int $maxRetries = null,
    ) {
        if ($this->timeoutMs !== null && ($this->timeoutMs <= 0 || $this->timeoutMs > ClientConfig::MAX_TIMER_MS)) {
            throw new UnifyPortConfigurationException(
                sprintf('execution.timeoutMs 必须是 1 到 %d 之间的整数', ClientConfig::MAX_TIMER_MS),
            );
        }

        if ($this->maxRetries !== null && $this->maxRetries < 0) {
            throw new UnifyPortConfigurationException('execution.maxRetries 必须是非负整数');
        }
    }
}
