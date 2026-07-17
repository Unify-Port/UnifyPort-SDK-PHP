<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Pagination;

use Generator;
use UnifyPort\Sdk\Exception\UnifyPortPaginationException;

final class CursorPaginator
{
    /**
     * @template TItem
     * @param callable(?string): CursorPage<TItem> $fetchPage
     * @return Generator<int, TItem, mixed, void>
     */
    public static function paginate(
        callable $fetchPage,
        ?CursorPaginationOptions $options = null,
    ): Generator {
        $options ??= new CursorPaginationOptions();
        $cursor = $options->initialCursor;
        /** @var array<string, true> $seen */
        $seen = [];
        if ($cursor !== null) {
            $seen[$cursor] = true;
        }

        for ($pageNumber = 1; $pageNumber <= $options->maxPages; ++$pageNumber) {
            $page = $fetchPage($cursor);
            foreach ($page->items as $item) {
                yield $item;
            }
            if (!$page->hasMore) {
                return;
            }

            $nextCursor = $page->nextCursor;
            if ($nextCursor === null || $nextCursor === '') {
                throw new UnifyPortPaginationException('上游返回 has_more=true 但缺少 next_cursor');
            }
            if (isset($seen[$nextCursor])) {
                throw new UnifyPortPaginationException('上游返回重复 next_cursor，已停止避免无限循环');
            }
            $seen[$nextCursor] = true;
            $cursor = $nextCursor;
        }

        throw new UnifyPortPaginationException(
            sprintf('cursor pagination 超过 maxPages=%d', $options->maxPages),
        );
    }
}
