<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Exception;

use RuntimeException;

class UnifyPortException extends RuntimeException
{
    public function __construct(
        string $message,
        public readonly ?string $api = null,
        public readonly ?string $operationId = null,
    ) {
        // previous exception 可能携带请求或 credential，公开异常链有意截断。
        parent::__construct($message);
    }
}
