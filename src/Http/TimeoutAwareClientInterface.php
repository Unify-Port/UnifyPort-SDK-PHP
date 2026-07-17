<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Http;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface TimeoutAwareClientInterface extends ClientInterface
{
    /**
     * PSR-18 没有 per-request timeout；实现此扩展可让 SDK 把 operation 剩余预算传给 transport。
     */
    public function sendRequestWithTimeout(RequestInterface $request, int $timeoutMs): ResponseInterface;
}
