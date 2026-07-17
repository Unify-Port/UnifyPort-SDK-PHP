<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Pagination;

use UnifyPort\Sdk\Exception\UnifyPortPaginationException;

final readonly class CursorPaginationOptions
{
    public const DEFAULT_MAX_PAGES = 10_000;

    public function __construct(
        public ?string $initialCursor = null,
        public int $maxPages = self::DEFAULT_MAX_PAGES,
    ) {
        if ($this->maxPages <= 0) {
            throw new UnifyPortPaginationException('maxPages 必须是正整数');
        }
    }
}
