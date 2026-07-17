<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Tests;

use PHPUnit\Framework\TestCase;
use UnifyPort\Sdk\Exception\UnifyPortPaginationException;
use UnifyPort\Sdk\Pagination\CursorPage;
use UnifyPort\Sdk\Pagination\CursorPaginationOptions;
use UnifyPort\Sdk\Pagination\CursorPaginator;

final class PaginationTest extends TestCase
{
    public function testIteratesPages(): void
    {
        $values = iterator_to_array(CursorPaginator::paginate(
            static fn (?string $cursor): CursorPage => $cursor === null
                ? new CursorPage([1, 2], true, 'next')
                : new CursorPage([3], false),
            new CursorPaginationOptions(maxPages: 2),
        ), false);

        self::assertSame([1, 2, 3], $values);
    }

    public function testRejectsRepeatedOrMissingCursor(): void
    {
        try {
            iterator_to_array(CursorPaginator::paginate(
                static fn (?string $_cursor): CursorPage => new CursorPage([], true, 'same'),
                new CursorPaginationOptions(initialCursor: 'same'),
            ));
            self::fail('Expected repeated cursor exception');
        } catch (UnifyPortPaginationException $exception) {
            self::assertStringContainsString('重复', $exception->getMessage());
        }

        $this->expectException(UnifyPortPaginationException::class);
        iterator_to_array(CursorPaginator::paginate(
            static fn (?string $_cursor): CursorPage => new CursorPage([], true),
        ));
    }

    public function testEnforcesMaxPagesAndTreatsZeroCursorAsValid(): void
    {
        $calls = [];
        try {
            iterator_to_array(CursorPaginator::paginate(
                static function (?string $cursor) use (&$calls): CursorPage {
                    $calls[] = $cursor;

                    return new CursorPage([], true, '0');
                },
                new CursorPaginationOptions(maxPages: 1),
            ));
            self::fail('Expected maxPages exception');
        } catch (UnifyPortPaginationException $exception) {
            self::assertStringContainsString('maxPages=1', $exception->getMessage());
            self::assertSame([null], $calls);
        }
    }
}
