<?php

declare(strict_types=1);

namespace UnifyPort\Sdk;

final readonly class OperationMetadata
{
    /**
     * @param list<array{name: string, required: bool}> $pathParameters
     * @param list<array{name: string, required: bool}> $queryParameters
     */
    public function __construct(
        public string $operationId,
        public string $method,
        public string $path,
        public string $tag,
        public string $summary,
        public bool $authRequired,
        public string $mutability,
        public bool $retryable,
        public bool $secretInput,
        public bool $secretOutput,
        public string $mcpExposure,
        public array $pathParameters,
        public array $queryParameters,
        public bool $requestBodyRequired,
        public bool $hasSuccessContent,
    ) {
    }

    /**
     * @param array{
     *   operationId: string,
     *   method: string,
     *   path: string,
     *   tag: string,
     *   summary: string,
     *   authRequired: bool,
     *   mutability: string,
     *   retryable: bool,
     *   secretInput: bool,
     *   secretOutput: bool,
     *   mcpExposure: string,
     *   pathParameters: list<array{name: string, required: bool}>,
     *   queryParameters: list<array{name: string, required: bool}>,
     *   requestBodyRequired: bool,
     *   hasSuccessContent: bool
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(...$data);
    }
}
