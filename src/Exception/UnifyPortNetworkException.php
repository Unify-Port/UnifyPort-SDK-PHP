<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Exception;

class UnifyPortNetworkException extends UnifyPortException
{
    public function __construct(
        string $message,
        public readonly string $url,
        ?string $api = null,
        ?string $operationId = null,
    ) {
        parent::__construct($message, $api, $operationId);
    }
}
