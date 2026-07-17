<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Http;

use UnifyPort\Sdk\Exception\UnifyPortConfigurationException;

final class UrlGuard
{
    public static function normalizeBaseUrl(string $value, bool $allowInsecureHttp): string
    {
        $parts = parse_url($value);
        if (!is_array($parts) || !isset($parts['scheme'], $parts['host'])) {
            throw new UnifyPortConfigurationException('baseUrl 必须是绝对 URL');
        }
        if (isset($parts['user']) || isset($parts['pass'])) {
            throw new UnifyPortConfigurationException('baseUrl 不能包含 username 或 password');
        }
        if (isset($parts['query']) || isset($parts['fragment'])) {
            throw new UnifyPortConfigurationException('baseUrl 不能包含 query 或 fragment');
        }

        $scheme = strtolower($parts['scheme']);
        $rawHost = $parts['host'];
        $bracketed = str_starts_with($rawHost, '[') && str_ends_with($rawHost, ']');
        $host = self::normalizeHost($rawHost);
        if (
            $host === ''
            || preg_match('/[\x00-\x20\x7F%\\\\]/', $host) === 1
            || preg_match('/[^A-Za-z0-9.:-]/', $host) === 1
            || ($bracketed && filter_var($host, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false)
            || (!$bracketed && str_contains($host, ':'))
            || (
                !$bracketed
                && preg_match('/^[0-9.]+$/', $host) === 1
                && filter_var($host, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === false
            )
        ) {
            // PSR transport 对模糊 authority 的解析不一致，先拒绝 Node WHATWG URL 也不会保留的写法。
            throw new UnifyPortConfigurationException('baseUrl host 包含不允许的字符');
        }
        if ($scheme !== 'https') {
            if ($scheme !== 'http' || !$allowInsecureHttp || !self::isLoopback($host)) {
                throw new UnifyPortConfigurationException(
                    'baseUrl 默认必须使用 HTTPS；loopback HTTP 需要 allowInsecureHttp: true',
                );
            }
        }

        $port = isset($parts['port']) ? (int) $parts['port'] : null;
        $origin = self::buildOrigin($scheme, $host, $port);
        $path = self::normalizePath($parts['path'] ?? '');
        $path = $path === '/' ? '' : rtrim($path, '/');

        return $origin . $path;
    }

    public static function ensureInsideBase(string $requestUrl, string $baseUrl): void
    {
        $request = self::parseAbsolute($requestUrl);
        $base = self::parseAbsolute($baseUrl);
        if (self::origin($request) !== self::origin($base)) {
            throw new UnifyPortConfigurationException('拒绝向配置 baseUrl 之外发送 credential');
        }

        $basePath = rtrim(self::normalizePath((string) ($base['path'] ?? '')), '/');
        $requestPath = self::normalizePath((string) ($request['path'] ?? ''));
        if ($basePath !== '' && $requestPath !== $basePath && !str_starts_with($requestPath, $basePath . '/')) {
            throw new UnifyPortConfigurationException('拒绝向配置 baseUrl 之外发送 credential');
        }
    }

    public static function safeRequestUrl(string $value): string
    {
        $parts = self::parseAbsolute($value);

        return self::origin($parts) . ($parts['path'] ?? '');
    }

    /** @return array<string, int|string> */
    private static function parseAbsolute(string $value): array
    {
        $parts = parse_url($value);
        if (!is_array($parts) || !isset($parts['scheme'], $parts['host'])) {
            throw new UnifyPortConfigurationException('请求 URL 必须是绝对 URL');
        }

        /** @var array<string, int|string> $parts */
        return $parts;
    }

    /** @param array<string, int|string> $parts */
    private static function origin(array $parts): string
    {
        return self::buildOrigin(
            strtolower((string) $parts['scheme']),
            self::normalizeHost((string) $parts['host']),
            isset($parts['port']) ? (int) $parts['port'] : null,
        );
    }

    private static function buildOrigin(string $scheme, string $host, ?int $port): string
    {
        $defaultPort = ($scheme === 'https' && $port === 443) || ($scheme === 'http' && $port === 80);
        $displayHost = str_contains($host, ':') ? '[' . $host . ']' : $host;

        return $scheme . '://' . $displayHost . ($port !== null && !$defaultPort ? ':' . $port : '');
    }

    private static function normalizeHost(string $host): string
    {
        return strtolower(trim($host, '[]'));
    }

    private static function normalizePath(string $path): string
    {
        // WHATWG URL 会在安全边界前消除 raw/percent-encoded dot segment；PSR URI 未统一该行为。
        $segments = explode('/', str_replace('\\', '/', $path));
        $normalized = [];
        foreach ($segments as $segment) {
            $decoded = rawurldecode($segment);
            if ($decoded === '.') {
                continue;
            }
            if ($decoded === '..') {
                if ($normalized !== [] && end($normalized) !== '') {
                    array_pop($normalized);
                }
                continue;
            }
            $normalized[] = $segment;
        }

        return implode('/', $normalized);
    }

    private static function isLoopback(string $host): bool
    {
        if ($host === 'localhost' || $host === '::1') {
            return true;
        }

        $parts = explode('.', $host);
        if (count($parts) !== 4 || $parts[0] !== '127') {
            return false;
        }

        foreach ($parts as $part) {
            if ($part === '' || !ctype_digit($part) || (int) $part > 255) {
                return false;
            }
        }

        return true;
    }
}
