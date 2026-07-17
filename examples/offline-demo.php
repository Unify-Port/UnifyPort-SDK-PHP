<?php

declare(strict_types=1);

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\Response;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use UnifyPort\Sdk\ClientConfig;
use UnifyPort\Sdk\UnifyPortDeviceClient;

require dirname(__DIR__) . '/vendor/autoload.php';

$httpClient = new class implements ClientInterface {
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        // 示例使用固定离线响应，保证不会接触真实 endpoint、credential 或用户数据。
        return new Response(
            200,
            ['X-Request-Id' => 'req_example'],
            '{"data":{"name":"Example Workspace","status":"active",'
            . '"account_quota":10,"account_quota_unlimited":false}}',
        );
    }
};
$factory = new Psr17Factory();
$client = new UnifyPortDeviceClient(new ClientConfig(
    baseUrl: 'https://device.example.com',
    apiKey: 'example-api-key',
    httpClient: $httpClient,
    requestFactory: $factory,
    streamFactory: $factory,
));
$result = $client->getWorkspace();

return [
    'workspace' => $result->data['data']['name'],
    'status' => $result->status,
    'requestId' => $result->requestId,
];
