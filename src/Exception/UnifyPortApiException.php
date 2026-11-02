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
        public readonly ?string $numericCode = null,
    ) {
        // 新增数字码放在参数末尾，保留既有位置调用；两类业务码均按字符串处理。
        parent::__construct($message, $api, $operationId);
    }
}
