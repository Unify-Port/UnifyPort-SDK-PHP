<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Exception;

final class UnifyPortApiException extends UnifyPortException
{
    public function __construct(
        string $message,
        public readonly int $status,
        public readonly string $apiCode,
        public readonly ?string $requestId = null,
        public readonly mixed $details = null,
        ?string $api = null,
        ?string $operationId = null,
    ) {
        // PHP Exception::getCode() 是整数语义，服务端字符串 code 使用独立字段避免错误强转。
        parent::__construct($message, $api, $operationId);
    }
}
