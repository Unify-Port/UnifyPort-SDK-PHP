<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Tests\Support;

use Closure;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;
use Throwable;
use UnifyPort\Sdk\Http\TimeoutAwareClientInterface;

final class QueueHttpClient implements TimeoutAwareClientInterface
{
    /** @var list<ResponseInterface|Throwable|Closure(RequestInterface, ?int): ResponseInterface> */
    private array $queue;

    /** @var list<RequestInterface> */
    public array $requests = [];

    /** @var list<int|null> */
    public array $timeouts = [];

    /** @param list<ResponseInterface|Throwable|Closure(RequestInterface, ?int): ResponseInterface> $queue */
    public function __construct(array $queue)
    {
        $this->queue = $queue;
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        return $this->dispatch($request, null);
    }

    public function sendRequestWithTimeout(RequestInterface $request, int $timeoutMs): ResponseInterface
    {
        return $this->dispatch($request, $timeoutMs);
    }

    private function dispatch(RequestInterface $request, ?int $timeoutMs): ResponseInterface
    {
        $this->requests[] = $request;
        $this->timeouts[] = $timeoutMs;
        $next = array_shift($this->queue);
        if ($next === null) {
            throw new RuntimeException('No queued response');
        }
        if ($next instanceof Throwable) {
            throw $next;
        }

        return $next instanceof Closure ? $next($request, $timeoutMs) : $next;
    }
}
