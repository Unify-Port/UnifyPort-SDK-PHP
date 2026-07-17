<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Http;

use DateTimeImmutable;
use DateTimeZone;
use JsonException;
use Psr\Http\Message\ResponseInterface;
use Throwable;
use UnifyPort\Sdk\ApiResult;
use UnifyPort\Sdk\ClientConfig;
use UnifyPort\Sdk\Exception\UnifyPortApiException;
use UnifyPort\Sdk\Exception\UnifyPortConfigurationException;
use UnifyPort\Sdk\Exception\UnifyPortException;
use UnifyPort\Sdk\Exception\UnifyPortNetworkException;
use UnifyPort\Sdk\Exception\UnifyPortResponseParseException;
use UnifyPort\Sdk\Exception\UnifyPortTimeoutException;
use UnifyPort\Sdk\OperationMetadata;
use UnifyPort\Sdk\OperationRequest;
use UnifyPort\Sdk\RequestExecutionOptions;
use UnifyPort\Sdk\Serialization\SafeJsonDecoder;

final readonly class Runtime
{
    /** @var list<int> */
    private const RETRYABLE_STATUSES = [408, 429, 502, 503, 504];

    private RequestBuilder $requestBuilder;
    private SafeJsonDecoder $decoder;

    public function __construct(private ClientConfig $config)
    {
        $this->requestBuilder = new RequestBuilder(
            $config->baseUrl,
            $config->requestFactory,
            $config->streamFactory,
        );
        $this->decoder = new SafeJsonDecoder();
    }

    /** @return ApiResult<mixed> */
    public function execute(
        OperationMetadata $operation,
        OperationRequest $input,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        $execution ??= new RequestExecutionOptions();
        $timeoutMs = $execution->timeoutMs ?? $this->config->timeoutMs;
        $deadline = hrtime(true) + ($timeoutMs * 1_000_000);
        $safeUrl = UrlGuard::safeRequestUrl($this->config->baseUrl . $operation->path);

        try {
            $apiKey = $this->config->resolveApiKey();
        } catch (UnifyPortConfigurationException $exception) {
            throw $exception;
        } catch (Throwable) {
            // credential provider 的原始异常可能含环境或 secret，不进入公开异常链。
            throw new UnifyPortNetworkException(
                'UnifyPort 网络请求失败',
                $safeUrl,
                'device',
                $operation->operationId,
            );
        }
        $this->assertWithinDeadline($deadline, $timeoutMs, $safeUrl, $operation);

        try {
            $request = $this->requestBuilder->build($operation, $input, $apiKey);
        } catch (UnifyPortException $exception) {
            throw $exception;
        } catch (Throwable) {
            // 第三方 PSR-17 factory 的异常可能带完整 URL、body 或 credential，统一在 preflight 脱敏。
            throw new UnifyPortNetworkException(
                'UnifyPort 网络请求失败',
                $safeUrl,
                'device',
                $operation->operationId,
            );
        }
        $safeUrl = UrlGuard::safeRequestUrl((string) $request->getUri());
        $maxRetries = $this->effectiveRetries($operation, $execution);

        for ($attempt = 0; $attempt <= $maxRetries; ++$attempt) {
            try {
                $remainingMs = $this->remainingMilliseconds($deadline, $timeoutMs, $safeUrl, $operation);
                $response = $this->config->httpClient instanceof TimeoutAwareClientInterface
                    ? $this->config->httpClient->sendRequestWithTimeout($request, $remainingMs)
                    : $this->config->httpClient->sendRequest($request);
                $this->assertWithinDeadline($deadline, $timeoutMs, $safeUrl, $operation);

                if (
                    $operation->retryable
                    && in_array($response->getStatusCode(), self::RETRYABLE_STATUSES, true)
                    && $attempt < $maxRetries
                ) {
                    $delay = $this->retryDelay($response, $attempt);
                    $response->getBody()->close();
                    $this->sleepWithinDeadline($delay, $deadline, $timeoutMs, $safeUrl, $operation);
                    continue;
                }

                $body = $this->readBody($response, $deadline, $timeoutMs, $safeUrl, $operation);
                $buffered = $response->withBody($this->config->streamFactory->createStream($body));

                return $this->unwrap($buffered, $body, $operation);
            } catch (UnifyPortException $exception) {
                throw $exception;
            } catch (Throwable) {
                $this->assertWithinDeadline($deadline, $timeoutMs, $safeUrl, $operation);
                if ($attempt === $maxRetries) {
                    if ($maxRetries === 0) {
                        throw new UnifyPortNetworkException(
                            'UnifyPort 网络请求失败',
                            $safeUrl,
                            'device',
                            $operation->operationId,
                        );
                    }
                    break;
                }
                $delay = $this->retryDelay(null, $attempt);
                $this->sleepWithinDeadline($delay, $deadline, $timeoutMs, $safeUrl, $operation);
            }
        }

        throw new UnifyPortNetworkException(
            'UnifyPort 请求在重试后仍失败',
            $safeUrl,
            'device',
            $operation->operationId,
        );
    }

    private function effectiveRetries(OperationMetadata $operation, RequestExecutionOptions $execution): int
    {
        if (!$operation->retryable || !$execution->retry) {
            return 0;
        }

        return min($execution->maxRetries ?? $this->config->retry->maxRetries, $this->config->retry->maxRetries);
    }

    private function retryDelay(?ResponseInterface $response, int $attempt): int
    {
        $cap = min(
            $this->config->retry->maxDelayMs,
            $this->config->retry->baseDelayMs * (2 ** $attempt),
        );
        $jitter = random_int(0, $cap);
        $retryAfter = $response === null ? null : $this->parseRetryAfter($response->getHeaderLine('Retry-After'));

        return min($this->config->retry->maxDelayMs, max($jitter, $retryAfter ?? 0));
    }

    private function parseRetryAfter(string $value): ?int
    {
        if ($value === '') {
            return null;
        }
        if (is_numeric($value)) {
            $seconds = (float) $value;
            if (!is_finite($seconds) || $seconds < 0) {
                return null;
            }
            // 先按全局 delay 上限截断，避免极大数值在转成 int 前溢出或产生 warning。
            if ($seconds >= $this->config->retry->maxDelayMs / 1_000) {
                return $this->config->retry->maxDelayMs;
            }

            return (int) round($seconds * 1_000);
        }

        $date = null;
        $timezone = new DateTimeZone('GMT');
        // 使用 HTTP-date 的三种标准写法，避免 PHP relative-date parser 接受 Node 会拒绝的自由文本。
        foreach (['!D, d M Y H:i:s \\G\\M\\T', '!l, d-M-y H:i:s \\G\\M\\T', '!D M j H:i:s Y'] as $format) {
            $candidate = DateTimeImmutable::createFromFormat($format, $value, $timezone);
            $errors = DateTimeImmutable::getLastErrors();
            if (
                $candidate !== false
                && ($errors === false || ($errors['warning_count'] === 0 && $errors['error_count'] === 0))
            ) {
                $date = $candidate;
                break;
            }
        }
        if ($date === null) {
            return null;
        }

        $seconds = max(0, $date->getTimestamp() - time());
        if ($seconds >= (int) ceil($this->config->retry->maxDelayMs / 1_000)) {
            return $this->config->retry->maxDelayMs;
        }

        return $seconds * 1_000;
    }

    private function sleepWithinDeadline(
        int $delayMs,
        int $deadline,
        int $timeoutMs,
        string $url,
        OperationMetadata $operation,
    ): void {
        if ($delayMs <= 0) {
            return;
        }

        $remainingMs = $this->remainingMilliseconds($deadline, $timeoutMs, $url, $operation);
        if ($delayMs >= $remainingMs) {
            usleep($remainingMs * 1_000);
            $this->throwTimeout($timeoutMs, $url, $operation);
        }
        usleep($delayMs * 1_000);
        $this->assertWithinDeadline($deadline, $timeoutMs, $url, $operation);
    }

    private function readBody(
        ResponseInterface $response,
        int $deadline,
        int $timeoutMs,
        string $url,
        OperationMetadata $operation,
    ): string {
        $stream = $response->getBody();
        try {
            $body = '';
            while (!$stream->eof()) {
                $this->assertWithinDeadline($deadline, $timeoutMs, $url, $operation);
                $chunk = $stream->read(8_192);
                $body .= $chunk;
                if (strlen($body) > $this->config->maxResponseBytes) {
                    $requestId = $this->requestId(null, $response);
                    throw new UnifyPortResponseParseException(
                        sprintf('UnifyPort 响应体超过 %d bytes', $this->config->maxResponseBytes),
                        status: $response->getStatusCode(),
                        requestId: $requestId,
                        api: 'device',
                        operationId: $operation->operationId,
                    );
                }
            }
            $this->assertWithinDeadline($deadline, $timeoutMs, $url, $operation);

            return $body;
        } finally {
            try {
                $stream->close();
            } catch (Throwable) {
                // close 失败不能覆盖已归一化的主异常，也不能泄漏第三方 stream 的诊断内容。
            }
        }
    }

    /** @return ApiResult<mixed> */
    private function unwrap(ResponseInterface $response, string $body, OperationMetadata $operation): ApiResult
    {
        $status = $response->getStatusCode();
        if ($status >= 200 && $status < 300) {
            if (!$operation->hasSuccessContent || $body === '') {
                return new ApiResult(null, $response, $status, $this->requestId(null, $response));
            }
            $requestId = $this->requestId(null, $response);
            $data = $this->decoder->decode(
                $body,
                $this->config->maxResponseBytes,
                $status,
                $requestId,
                $operation->operationId,
            );
            $requestId = $this->requestId($data, $response);

            return new ApiResult($data, $response, $status, $requestId);
        }

        $payload = null;
        if ($body !== '') {
            try {
                $payload = json_decode($body, true, 64, JSON_THROW_ON_ERROR);
            } catch (JsonException) {
                $payload = null;
            }
        }
        $code = 'HTTP_' . $status;
        if (is_array($payload)) {
            $nested = isset($payload['error']) && is_array($payload['error']) ? $payload['error'] : $payload;
            $code = $this->diagnostic($nested['code'] ?? null, 64) ?? $code;
        }
        $requestId = $this->requestId($payload, $response);

        throw new UnifyPortApiException(
            sprintf('UnifyPort API 返回 %s (HTTP %d)', $code, $status),
            $status,
            $code,
            $requestId,
            null,
            'device',
            $operation->operationId,
        );
    }

    private function requestId(mixed $payload, ResponseInterface $response): ?string
    {
        if (is_array($payload)) {
            $fromBody = $this->diagnostic($payload['request_id'] ?? null, 128)
                ?? $this->diagnostic($payload['requestId'] ?? null, 128);
            if ($fromBody !== null) {
                return $fromBody;
            }
        }

        return $this->diagnostic($response->getHeaderLine('X-Request-Id'), 128);
    }

    private function diagnostic(mixed $value, int $maximumLength): ?string
    {
        return is_string($value)
            && $value !== ''
            && strlen($value) <= $maximumLength
            && preg_match('#^[A-Za-z0-9_.:/-]+$#D', $value) === 1
                ? $value
                : null;
    }

    private function remainingMilliseconds(
        int $deadline,
        int $timeoutMs,
        string $url,
        OperationMetadata $operation,
    ): int {
        $remaining = $deadline - hrtime(true);
        if ($remaining <= 0) {
            $this->throwTimeout($timeoutMs, $url, $operation);
        }

        return max(1, (int) ceil($remaining / 1_000_000));
    }

    private function assertWithinDeadline(
        int $deadline,
        int $timeoutMs,
        string $url,
        OperationMetadata $operation,
    ): void {
        if (hrtime(true) >= $deadline) {
            $this->throwTimeout($timeoutMs, $url, $operation);
        }
    }

    private function throwTimeout(int $timeoutMs, string $url, OperationMetadata $operation): never
    {
        throw new UnifyPortTimeoutException(
            sprintf('UnifyPort 请求超过 %dms', $timeoutMs),
            $url,
            $timeoutMs,
            'device',
            $operation->operationId,
        );
    }
}
