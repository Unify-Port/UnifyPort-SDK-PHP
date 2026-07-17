<?php

declare(strict_types=1);

namespace UnifyPort\Sdk;

use Psr\Http\Message\ResponseInterface;

/** @template TData */
final readonly class ApiResult
{
    /** @param TData $data */
    public function __construct(
        public mixed $data,
        public ResponseInterface $response,
        public int $status,
        public ?string $requestId = null,
    ) {
    }
}
