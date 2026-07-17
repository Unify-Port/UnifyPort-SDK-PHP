<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Exception;

final class UnifyPortResponseParseException extends UnifyPortException
{
    public function __construct(
        string $message,
        public readonly ?int $status = null,
        public readonly ?string $requestId = null,
        ?string $api = null,
        ?string $operationId = null,
    ) {
        parent::__construct($message, $api, $operationId);
    }
}
