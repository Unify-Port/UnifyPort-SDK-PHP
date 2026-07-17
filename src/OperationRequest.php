<?php

declare(strict_types=1);

namespace UnifyPort\Sdk;

use UnifyPort\Sdk\Exception\UnifyPortConfigurationException;

final readonly class OperationRequest
{
    /**
     * @param array<string, scalar> $path
     * @param array<string, scalar|list<scalar>|null> $query
     * @param array<string, string> $headers
     */
    public function __construct(
        public array $path = [],
        public array $query = [],
        public mixed $body = null,
        public bool $hasBody = false,
        public array $headers = [],
    ) {
    }

    /**
     * @param array{
     *   params?: array{
     *     path?: array<string, scalar>,
     *     query?: array<string, scalar|list<scalar>|null>,
     *     header?: array<string, string>
     *   },
     *   body?: mixed,
     *   headers?: array<string, string>
     * } $request
     */
    public static function fromArray(array $request): self
    {
        $unknown = array_diff(array_keys($request), ['params', 'body', 'headers']);
        if ($unknown !== []) {
            throw new UnifyPortConfigurationException('operation request 包含未支持的顶层字段');
        }

        $params = $request['params'] ?? [];
        $unknownParams = array_diff(array_keys($params), ['path', 'query', 'header']);
        if ($unknownParams !== []) {
            throw new UnifyPortConfigurationException('operation request.params 包含未支持的字段');
        }

        return new self(
            path: $params['path'] ?? [],
            query: $params['query'] ?? [],
            body: $request['body'] ?? null,
            hasBody: array_key_exists('body', $request),
            // 顶层 headers 与 Node FetchOptions 对齐；params.header 仅保留作兼容入口。
            headers: array_merge($params['header'] ?? [], $request['headers'] ?? []),
        );
    }
}
