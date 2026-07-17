<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Serialization;

use JsonException;
use UnifyPort\Sdk\Exception\UnifyPortResponseParseException;

final class SafeJsonDecoder
{
    private const MAX_SAFE_INTEGER = '9007199254740991';
    private const MAX_CANONICAL_INTEGER_DIGITS = 1024;

    public function decode(
        string $json,
        int $maximumBytes,
        ?int $status = null,
        ?string $requestId = null,
        ?string $operationId = null,
    ): mixed {
        try {
            $normalized = $this->normalizeNumbers($json, $maximumBytes);

            return json_decode($normalized, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException | \RuntimeException) {
            // parser 原始异常可能带响应片段，公开错误只携带稳定诊断信息。
            throw new UnifyPortResponseParseException(
                '无法解析 UnifyPort API 响应',
                status: $status,
                requestId: $requestId,
                api: 'device',
                operationId: $operationId,
            );
        }
    }

    private function normalizeNumbers(string $json, int $maximumBytes): string
    {
        $length = strlen($json);
        $result = '';
        $resultLength = 0;
        $inString = false;
        $escaped = false;

        for ($index = 0; $index < $length;) {
            $character = $json[$index];
            if ($inString) {
                $result .= $character;
                ++$resultLength;
                if ($escaped) {
                    $escaped = false;
                } elseif ($character === '\\') {
                    $escaped = true;
                } elseif ($character === '"') {
                    $inString = false;
                }
                ++$index;
                continue;
            }

            if ($character === '"') {
                $inString = true;
                $result .= $character;
                ++$resultLength;
                ++$index;
                continue;
            }

            if ($character === '-' || ctype_digit($character)) {
                if (
                    preg_match(
                        '/\G-?(?:0|[1-9][0-9]*)(?:\.[0-9]+)?(?:[eE][+-]?[0-9]+)?/',
                        $json,
                        $match,
                        0,
                        $index,
                    ) !== 1
                ) {
                    throw new \RuntimeException('Invalid JSON number');
                }
                $token = $match[0];
                $replacement = $this->normalizeIntegerToken($token);
                $piece = $replacement ?? $token;
                $resultLength += strlen($piece);
                if ($resultLength > $maximumBytes) {
                    throw new \RuntimeException('Normalized JSON exceeds maximumBytes');
                }
                $result .= $piece;
                $index += strlen($token);
                continue;
            }

            $result .= $character;
            ++$resultLength;
            ++$index;
            if ($resultLength > $maximumBytes) {
                throw new \RuntimeException('Normalized JSON exceeds maximumBytes');
            }
        }

        return $result;
    }

    /**
     * 返回 null 表示非整数；安全整数返回 canonical number，非安全整数返回 JSON string。
     */
    private function normalizeIntegerToken(string $token): ?string
    {
        if (preg_match('/^(-?)([0-9]+)(?:\.([0-9]+))?(?:[eE]([+-]?[0-9]+))?$/', $token, $parts) !== 1) {
            return null;
        }

        $sign = $parts[1];
        $whole = $parts[2];
        $fraction = $parts[3] ?? '';
        $coefficient = $whole . $fraction;
        if (trim($coefficient, '0') === '') {
            return '0';
        }

        $numeric = (float) $token;
        if (!is_finite($numeric) || $numeric == 0.0) {
            throw new \RuntimeException('JSON number magnitude exceeds supported range');
        }

        $exponentText = $parts[4] ?? '0';
        $exponentMagnitude = ltrim($exponentText, '+-0');
        if (strlen($exponentMagnitude) > 6) {
            throw new \RuntimeException('JSON number exponent exceeds supported range');
        }
        $exponent = (int) $exponentText;
        $scale = strlen($fraction) - $exponent;

        if ($scale > 0) {
            if ($scale > strlen($coefficient) || substr($coefficient, -$scale) !== str_repeat('0', $scale)) {
                return null;
            }
            $integerDigits = substr($coefficient, 0, -$scale);
        } else {
            $zeros = -$scale;
            if (strlen($coefficient) + $zeros > self::MAX_CANONICAL_INTEGER_DIGITS) {
                throw new \RuntimeException('JSON integer exceeds supported digits');
            }
            $integerDigits = $coefficient . str_repeat('0', $zeros);
        }

        $integerDigits = ltrim($integerDigits, '0');
        $integerDigits = $integerDigits === '' ? '0' : $integerDigits;
        if (strlen($integerDigits) > self::MAX_CANONICAL_INTEGER_DIGITS) {
            throw new \RuntimeException('JSON integer exceeds supported digits');
        }

        $canonical = ($sign === '-' ? '-' : '') . $integerDigits;
        if ($this->outsideSafeInteger($integerDigits)) {
            return '"' . $canonical . '"';
        }

        return $canonical;
    }

    private function outsideSafeInteger(string $digits): bool
    {
        $safeLength = strlen(self::MAX_SAFE_INTEGER);
        $length = strlen($digits);

        return $length > $safeLength
            || ($length === $safeLength && strcmp($digits, self::MAX_SAFE_INTEGER) > 0);
    }
}
