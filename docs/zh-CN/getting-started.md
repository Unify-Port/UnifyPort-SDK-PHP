# 入门

[English](../getting-started.md) | [简体中文](getting-started.md)

## 环境要求

- 64-bit PHP 8.2+；
- Composer；
- PSR-18 HTTP Client；
- PSR-17 request/stream factories；
- 通过安全运行时配置提供 Device API base URL 和 API key。

发布到 Packagist 后安装：

```bash
composer require unifyport/sdk
composer require guzzlehttp/guzzle nyholm/psr7
```

API key callback 每个逻辑 operation 只解析一次，因此同一次 retry 复用一个 credential，下一个 operation 可以读取轮换后的值。

```php
$device = new UnifyPortDeviceClient(new ClientConfig(
    baseUrl: requiredEnv('UNIFYPORT_DEVICE_API_BASE_URL'),
    apiKey: static fn (): string => requiredEnv('UNIFYPORT_DEVICE_API_KEY'),
    httpClient: $httpClient,
    requestFactory: $factory,
    streamFactory: $factory,
));
```

远程地址必须使用 HTTPS。本地开发只有显式设置 `allowInsecureHttp: true` 才允许 loopback HTTP。包含 userinfo、query 或 fragment 的 base URL 会被拒绝。

```php
$result = $device->listProviderRegions([
    'params' => [
        'path' => ['provider' => 'whatsapp'],
    ],
]);
```

`docs/zh-CN/api-reference.md` 列出全部 operationId、HTTP path、required input、retry 和 secret 分类。请求与响应字段仍以 `contracts/device.openapi.yaml` 为准；`SchemaCatalog` 直接暴露已提交 schema，不维护 PHP 自有业务定义。

处理异常时只读取经过筛选的 `status`、`apiCode` 和 `requestId`。不要记录请求体或 API key。上游 message 可能回显敏感输入，因此 SDK 会替换成稳定的本地消息。

离线示例使用本地 fake PSR-18 client 和虚构数据：

```bash
composer install
composer examples:check
```
