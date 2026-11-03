# Node/PHP 功能对齐

[English](../node-parity.md) | [简体中文](node-parity.md)

## 基线

| 项目 | 基线 |
| --- | --- |
| Node package | `@unifyport/sdk-node` `0.4.0` |
| 公开 Node commit | `ce60499d7169c860ed3f64a686e04bff44316f35` |
| Contract SHA-256 | `8190a34dc8ed60476f79e00b37d9dea418082886724ee6d64efa389f440adffc` |
| Operation | 78 |
| Component schema | 225 |
| Resource tag | 13 |

`parity/source.json` 记录来源；生成的 `parity/manifest.json` 保存每个 operation 的 method、path、tag、参数、request body、retry、mutability、secret 和 MCP 分类。

Baseline kind 为 `approved-source`。表中的包版本是该 commit 的源码元数据，不表示 npm 该版本已发布本次能力。

## 模块映射

| Node SDK | PHP SDK | 状态 |
| --- | --- | --- |
| `contracts/device.openapi.yaml` | 同名 contract | 精确公开快照 |
| `UnifyPortDeviceClient` | 同名 client | 78 个相同 operationId 方法 |
| `schema.ts` | `SchemaCatalog` + `ApiTypes` | 225 个 schema 可追踪，并生成 input/output PHPStan alias |
| `operation-catalog.ts` | `OperationCatalog` | method/path/policy 对齐 |
| 扁平生成 client | client trait + 11 个 tag API module | 78 个 operationId/method/path 映射一致；资源模块仅代理 |
| `DeviceClientConfig` | `ClientConfig` | 核心配置/默认值一致；PSR 依赖显式注入 |
| Node error classes | PHP `Exception` namespace | 语义一一映射 |
| `paginateCursor` | `CursorPaginator::paginate` | cursor/maxPages 对齐；取消差异见下文 |

资源覆盖为 Workspace 2、API Keys 4、Providers 1、Accounts 5、Account Auth 8、Account Runtime 4、Conversations 13、Contacts 6、Groups 10、Messages 5、Webhook Endpoints 6；没有遗漏公开 Device API operation。

## PHP request surface 内已对齐行为

- client config 统一注入 `X-Api-Key`，调用参数无法覆盖认证；
- 默认 HTTPS，仅显式允许 loopback HTTP；拒绝 userinfo/query/fragment；
- credential provider 每个逻辑 operation 解析一次；
- 19 个显式安全 operation 才可 retry，状态为 `408/429/502/503/504` 或 transport failure；
- timeout、retry、delay、response limit 默认值一致；
- 204 在 PHP 中返回 `null`；
- 超出 JavaScript safe integer 的整数（含 decimal/exponent 写法）转成规范十进制字符串；
- 错误码/request ID 长度与字符 allowlist、错误脱敏和响应字节上限一致；
- cursor 缺失、重复和 maxPages 行为一致。

## 有意差异

| 差异 | 原因和影响 |
| --- | --- |
| `undefined` → `null` | PHP 没有 `undefined`。 |
| 返回 plain array | Node 运行时同样返回普通 JSON object；OpenAPI、PHPDoc、`SchemaCatalog` 继续作为类型来源。 |
| 新增 tag API module | PHP 便利入口，全部代理同一扁平 client。 |
| 不暴露高级 `FetchOptions` hook | PHP 支持生成的 path/query/body/header 形状，不暴露 Node 专属 serializer、middleware、`fetch`、`baseUrl`、`redirect`、`parseAs` 覆盖；通用行为集中处理。 |
| routing/framing header 为保留项 | PSR transport 没有统一 forbidden-header 策略，因此 PHP 会丢弃认证、`Host`、forwarding、hop-by-hop 和 message-framing 覆盖。 |
| base URL host 使用 ASCII | IDN 应提供 punycode；模糊 host 字符会在进入 PSR transport 前被拒绝。 |
| 没有 `AbortSignal` | 同步 PHP/PSR-18 没有标准取消信号；保留 `UnifyPortAbortException`，暂不暴露 cursor cancellation。 |
| PHP timeout 是 cooperative | `TimeoutAwareClientInterface` 可接收 transport 剩余预算；同步 credential callback、普通 `sendRequest()` 或 PSR-7 `read()` 阻塞时无法被 SDK 中断，只能在返回后检测；SDK 自己控制的 retry/backoff 会直接受限。 |
| Redirect 由注入 client 配置 | PSR-18 没有 per-request redirect 参数；应用必须关闭 redirect。 |
| PSR-7 response body 可重读 | PHP 返回 buffered response；业务仍应使用 `ApiResult::data`。 |

已知 transport 差距包括 timeout interruption、cancellation 和 redirect ownership，文档不会把它们描述成完全等价。

## 不支持或延期

- MCP Server：不属于 PHP SDK；
- webhook 验签：公开契约未定义完整算法；
- generic raw request：为保护 credential 和 operation policy 明确不提供；
- async PHP client：当前只覆盖同步 PSR-18。
