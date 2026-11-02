# UnifyPort PHP SDK

[English](README.md) | [简体中文](README.zh-CN.md)

面向 PHP 8.2+ 的官方 UnifyPort Device API SDK。它通过单一 `UnifyPortDeviceClient`、可选资源 API 模块、统一结果与异常模型、安全重试、cooperative operation deadline、响应上限和 cursor 分页，覆盖全部 78 个公开 operation。

当前基线对齐已批准的公开 Node 源码 `5901244`，该 commit 的包版本元数据为 `0.4.0`。仓库提交 OpenAPI 契约和生成的 parity manifest，后续可以自动发现 Node SDK 漂移。

## 范围

- PHP `8.2+`、64-bit runtime；
- Composer + PSR-4；
- 应用注入 PSR-18 HTTP Client 与 PSR-17 request/stream factories；
- 78 个 Device API operation、218 个公开 component schema；
- 每个 operation 自动生成 request/response PHPStan 类型，并区分 input/output integer 语义；
- 固定使用 `X-Api-Key`；
- JSON 请求与响应；
- MIT License。

SDK 源码沿用 Node package 的 MIT License；精确 contract 快照保留上游针对被暴露 API 的 `LicenseRef-Proprietary` metadata，该字段不会覆盖 SDK 源码许可证。剩余的 API 条款文档事项见 [许可说明](NOTICE.zh-CN.md)。

本仓库不迁移 Node workspace 中的私有 MCP package，也不会推测公开契约未定义的 API 或 webhook 验签规则。

## 安装

发布到 Packagist 后执行：

```bash
composer require unifyport/sdk
```

应用还需要选择 PSR 实现，例如：

```bash
composer require guzzlehttp/guzzle nyholm/psr7
```

## 初始化

```php
<?php

declare(strict_types=1);

use GuzzleHttp\Client;
use Nyholm\Psr7\Factory\Psr17Factory;
use UnifyPort\Sdk\ClientConfig;
use UnifyPort\Sdk\UnifyPortDeviceClient;

require __DIR__ . '/vendor/autoload.php';

function requiredEnv(string $name): string
{
    $value = getenv($name);
    if (!is_string($value) || trim($value) === '') {
        throw new RuntimeException(sprintf('Missing required environment variable: %s', $name));
    }

    return $value;
}

$httpClient = new Client([
    'allow_redirects' => false,
    'http_errors' => false,
    'timeout' => 30.0,
]);
$factory = new Psr17Factory();
$device = new UnifyPortDeviceClient(new ClientConfig(
    baseUrl: requiredEnv('UNIFYPORT_DEVICE_API_BASE_URL'),
    apiKey: static fn (): string => requiredEnv('UNIFYPORT_DEVICE_API_KEY'),
    httpClient: $httpClient,
    requestFactory: $factory,
    streamFactory: $factory,
));
```

认证信息应来自运行环境或 secret provider，不能进入源码、示例、日志、异常或已提交的 `.env`。建议使用 callback 而不是明文字符串，生产环境开启 `zend.exception_ignore_args=On`，且不要 dump exception trace，因为 PHP 可能保留调用参数。注入的 HTTP client 必须关闭 redirect 和 HTTP status 自动异常。认证、`Host`、forwarding、hop-by-hop 和 message-framing header 属于保留项，会从单次调用的自定义 header 中丢弃。

## 调用 API

公开方法名保持 OpenAPI `operationId` 和 Node SDK 方法名。path/query 参数位于 `params`，自定义 HTTP header 位于顶层 `headers`，JSON 数据位于 `body`。兼容入口 `params.header` 仍可使用，但新代码应采用 Node 的顶层 header 形状：

```php
$workspace = $device->getWorkspace();
echo $workspace->data['data']['name'];

$contacts = $device->listContacts([
    'params' => [
        'path' => ['account_id' => 'acc_example'],
        'query' => ['limit' => 100, 'q' => 'Alice Example'],
    ],
]);

$message = $device->sendMessage([
    'body' => [
        'account_id' => 'acc_example',
        'to' => ['id' => 'recipient_example', 'type' => 'user'],
        'message' => ['type' => 'text', 'text' => 'Hello from UnifyPort'],
    ],
]);
```

也可以使用按 tag 生成的资源入口；它只是代理同一个 operation，不会产生第二套协议定义：

```php
$contacts = $device->contacts()->listContacts([
    'params' => [
        'path' => ['account_id' => 'acc_example'],
        'query' => ['limit' => 100],
    ],
]);
```

完整列表见 [Device API operation 参考](docs/zh-CN/api-reference.md)。

## 结果与异常

每个 operation 返回 `ApiResult<T>`：

| 属性 | 含义 |
| --- | --- |
| `data` | 完整反序列化 JSON envelope；业务数据通常位于 `data['data']` |
| `response` | body 已重新缓冲、可读取的 PSR-7 response |
| `status` | HTTP status |
| `requestId` | 从 body 或 header 筛选后的 request ID |

只捕获能够处理的具体异常类型：

```php
use UnifyPort\Sdk\Exception\UnifyPortApiException;
use UnifyPort\Sdk\Exception\UnifyPortNetworkException;
use UnifyPort\Sdk\Exception\UnifyPortResponseParseException;
use UnifyPort\Sdk\Exception\UnifyPortTimeoutException;

try {
    $workspace = $device->getWorkspace();
} catch (UnifyPortApiException $error) {
    // apiCode、status 和 requestId 已筛选，不保留上游 message/details。
    error_log(sprintf('UnifyPort request failed: %s (%d)', $error->apiCode, $error->status));
} catch (UnifyPortTimeoutException $error) {
    error_log(sprintf('UnifyPort request exceeded %dms', $error->timeoutMs));
} catch (UnifyPortResponseParseException | UnifyPortNetworkException $error) {
    error_log('UnifyPort request could not be completed');
}
```

异常体系包含配置、网络、超时、取消保留类型、响应解析、分页和 API 异常。`UnifyPortApiException::$apiCode` 保存服务端字符串错误码；PHP 原生 `Exception::getCode()` 不承载它。公开异常字段、message 和 previous exception 不保留原始 body、敏感 header 或上游 message/details；PHP engine trace 不在此保证内，生产环境应开启 `zend.exception_ignore_args=On` 且不要 dump trace。

## 超时、重试和响应上限

```php
use UnifyPort\Sdk\ClientConfig;
use UnifyPort\Sdk\RequestExecutionOptions;
use UnifyPort\Sdk\RetryConfig;

$device = new UnifyPortDeviceClient(new ClientConfig(
    baseUrl: requiredEnv('UNIFYPORT_DEVICE_API_BASE_URL'),
    apiKey: static fn (): string => requiredEnv('UNIFYPORT_DEVICE_API_KEY'),
    httpClient: $httpClient,
    requestFactory: $factory,
    streamFactory: $factory,
    timeoutMs: 15_000,
    maxResponseBytes: 4 * 1024 * 1024,
    retry: new RetryConfig(maxRetries: 2, baseDelayMs: 200, maxDelayMs: 5_000),
));

$result = $device->getWorkspace([], new RequestExecutionOptions(
    timeoutMs: 5_000,
    maxRetries: 1,
));
```

配置默认值与 Node SDK 一致：deadline 30 秒；仅显式安全 operation 最多重试 2 次；退避 200ms 到 5 秒；响应默认上限 8 MiB、最大 64 MiB。单次调用只能关闭或收紧 retry，普通 write 和不在 allowlist 中的 operation 永不自动 retry。

PHP 同步接口只能提供 cooperative deadline，不能等价替代 `AbortSignal`。`TimeoutAwareClientInterface` 会把 transport 剩余预算传给 adapter；普通 PSR-18 的 `sendRequest()`、credential callback 或 PSR-7 stream 的 `read()` 一旦阻塞，SDK 只能在它们返回后检测超时，SDK 自己控制的 retry/backoff 则会直接受 deadline 约束。详见 [Node 对齐说明](docs/zh-CN/node-parity.md)。

## Cursor 分页

`CursorPaginator::paginate()` 默认最多 10,000 页，并检测缺失或重复 cursor：

```php
use UnifyPort\Sdk\Pagination\CursorPage;
use UnifyPort\Sdk\Pagination\CursorPaginationOptions;
use UnifyPort\Sdk\Pagination\CursorPaginator;

foreach (CursorPaginator::paginate(
    function (?string $cursor) use ($device): CursorPage {
        $query = $cursor === null ? ['limit' => 100] : ['cursor' => $cursor, 'limit' => 100];
        $result = $device->listContacts([
            'params' => [
                'path' => ['account_id' => 'acc_example'],
                'query' => $query,
            ],
        ]);
        $page = $result->data['data'];

        return new CursorPage(
            items: $page['items'],
            hasMore: $page['has_more'],
            nextCursor: $page['next_cursor'] ?? null,
        );
    },
    new CursorPaginationOptions(maxPages: 100),
) as $contact) {
    // 逐项处理联系人。
}
```

paginator 会在 cursor 缺失或重复时停止，默认安全上限为 10,000 页。

## 自定义 PSR-18 client

SDK 不绑定单一 HTTP 实现，可注入任意 PSR-18 client 和 PSR-17 request/stream factory。应用负责关闭 redirect 并配置有限 transport timeout。若要把 operation 剩余预算传入 transport，可用所选 client 实现 `UnifyPort\Sdk\Http\TimeoutAwareClientInterface` adapter。

## 开发与验证

```bash
composer install
composer validate --strict
composer generate:check
composer lint
composer analyse
composer test
composer examples:check
composer public:check
composer archive:check
composer check
composer parity:check -- ../UnifyPort-SDK-Nodejs
```

`examples/offline-demo.php` 会由 `composer examples:check` 离线执行，不会访问网络。

## 版本与 Node 兼容策略

- OpenAPI `operationId` 是公开 PHP 方法名；
- 删除/重命名 operation、增加必填输入或收窄字段属于 breaking change；
- 新增 optional 字段仍需 release note 和生成后的 parity review；
- `parity/manifest.json` 记录完整 operation surface 与 policy 快照；
- 同步流程见 [维护说明](docs/zh-CN/maintenance.md)；
- 有意语言差异和当前支持状态见 [Node 对齐说明](docs/zh-CN/node-parity.md)。

## 参与贡献

修改 contract、generator、runtime 或公开 API 前请阅读 [CONTRIBUTING.zh-CN.md](CONTRIBUTING.zh-CN.md)。安全问题按 [SECURITY.zh-CN.md](SECURITY.zh-CN.md) 报告。

当前同步基线是已批准的 Node 源码 `5901244`，不代表 npm 已发布同等能力。本轮未发布任何包。详见 [本次契约更新](docs/zh-CN/contract-update.md)。
