<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Http;

use JsonException;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriInterface;
use UnifyPort\Sdk\Exception\UnifyPortConfigurationException;
use UnifyPort\Sdk\OperationMetadata;
use UnifyPort\Sdk\OperationRequest;

final readonly class RequestBuilder
{
    /** @var list<string> */
    private const RESERVED_HEADERS = [
        'authorization',
        'connection',
        'content-length',
        'cookie',
        'forwarded',
        'host',
        'keep-alive',
        'proxy-authenticate',
        'proxy-authorization',
        'proxy-connection',
        'te',
        'trailer',
        'transfer-encoding',
        'upgrade',
        'x-api-key',
        'x-forwarded-host',
        'x-forwarded-port',
        'x-forwarded-proto',
    ];

    public function __construct(
        private string $baseUrl,
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
    ) {
    }

    public function build(OperationMetadata $operation, OperationRequest $input, string $apiKey): RequestInterface
    {
        $path = $operation->path;
        $declaredPath = array_column($operation->pathParameters, 'name');
        $unknownPath = array_diff(array_keys($input->path), $declaredPath);
        if ($unknownPath !== []) {
            throw new UnifyPortConfigurationException('operation request 包含未声明的 path 参数');
        }
        foreach ($operation->pathParameters as $parameter) {
            $name = $parameter['name'];
            if (!array_key_exists($name, $input->path)) {
                if ($parameter['required']) {
                    throw new UnifyPortConfigurationException(sprintf('缺少 path 参数: %s', $name));
                }
                continue;
            }
            $path = str_replace('{' . $name . '}', rawurlencode(self::scalar($input->path[$name])), $path);
        }
        if (preg_match('/\{[^}]+\}/', $path) === 1) {
            throw new UnifyPortConfigurationException('请求 path 仍包含未解析参数');
        }

        $declaredQuery = array_column($operation->queryParameters, 'name');
        $unknownQuery = array_diff(array_keys($input->query), $declaredQuery);
        if ($unknownQuery !== []) {
            throw new UnifyPortConfigurationException('operation request 包含未声明的 query 参数');
        }
        foreach ($operation->queryParameters as $parameter) {
            if (
                $parameter['required']
                && (!array_key_exists($parameter['name'], $input->query) || $input->query[$parameter['name']] === null)
            ) {
                throw new UnifyPortConfigurationException(sprintf('缺少 query 参数: %s', $parameter['name']));
            }
        }

        $url = $this->baseUrl . $path . self::queryString($input->query);
        UrlGuard::ensureInsideBase($url, $this->baseUrl);
        $request = $this->requestFactory->createRequest($operation->method, $url);
        // PSR-17 factory 可能重写 URI；必须验证实际 Request 后才允许注入 credential。
        UrlGuard::ensureInsideBase((string) $request->getUri(), $this->baseUrl);
        foreach (array_keys($request->getHeaders()) as $name) {
            if (self::isReservedHeader($name)) {
                $request = $request->withoutHeader($name);
            }
        }
        // factory 预置的 Host 不可信，按已经验证的 URI authority 重新构造。
        $request = $request
            ->withUri($request->getUri(), false)
            ->withHeader('Host', self::hostHeader($request->getUri()));

        foreach ($input->headers as $name => $value) {
            if (self::isReservedHeader($name)) {
                continue;
            }
            $request = $request->withHeader($name, $value);
        }
        $request = $request->withoutHeader('Authorization')
            ->withoutHeader('Cookie')
            ->withHeader('X-Api-Key', $apiKey);

        if ($operation->requestBodyRequired && !$input->hasBody) {
            throw new UnifyPortConfigurationException(sprintf('%s 缺少 required request body', $operation->operationId));
        }
        if ($input->hasBody) {
            try {
                $body = json_encode(
                    $input->body,
                    JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                );
            } catch (JsonException) {
                throw new UnifyPortConfigurationException('request body 无法序列化为 JSON');
            }
            if (!$request->hasHeader('Content-Type')) {
                // 与 Node FetchOptions 一致：只有调用方未提供时才补 JSON content type。
                $request = $request->withHeader('Content-Type', 'application/json');
            }
            $request = $request->withBody($this->streamFactory->createStream($body));
        }

        UrlGuard::ensureInsideBase((string) $request->getUri(), $this->baseUrl);

        return $request;
    }

    private static function isReservedHeader(string $name): bool
    {
        // 保留认证、路由和 framing header 的控制权，避免第三方 transport 产生跨主机或请求走私歧义。
        $normalized = strtolower($name);

        return in_array($normalized, self::RESERVED_HEADERS, true)
            || str_starts_with($normalized, 'x-forwarded-');
    }

    private static function hostHeader(UriInterface $uri): string
    {
        $host = $uri->getHost();
        if (str_contains($host, ':') && !str_starts_with($host, '[')) {
            $host = '[' . $host . ']';
        }

        return $host . ($uri->getPort() === null ? '' : ':' . $uri->getPort());
    }

    /** @param array<string, scalar|list<scalar>|null> $query */
    private static function queryString(array $query): string
    {
        $pairs = [];
        foreach ($query as $name => $value) {
            if ($value === null) {
                continue;
            }
            $values = is_array($value) ? $value : [$value];
            foreach ($values as $item) {
                $pairs[] = rawurlencode($name) . '=' . rawurlencode(self::scalar($item));
            }
        }

        return $pairs === [] ? '' : '?' . implode('&', $pairs);
    }

    private static function scalar(string|int|float|bool $value): string
    {
        return match (true) {
            is_bool($value) => $value ? 'true' : 'false',
            default => (string) $value,
        };
    }
}
