<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Exception;

final class UnifyPortTimeoutException extends UnifyPortNetworkException
{
    public function __construct(
        string $message,
        string $url,
        public readonly int $timeoutMs,
        ?string $api = null,
        ?string $operationId = null,
    ) {
        parent::__construct($message, $url, $api, $operationId);
    }
}
