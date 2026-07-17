<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Pagination;

/** @template TItem */
final readonly class CursorPage
{
    /**
     * @param list<TItem> $items
     */
    public function __construct(
        public array $items,
        public bool $hasMore,
        public ?string $nextCursor = null,
    ) {
    }
}
