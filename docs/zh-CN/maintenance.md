# 维护与 Node 同步

[English](../maintenance.md) | [简体中文](maintenance.md)

## 真源规则

- 公开 Node SDK 是行为基准；
- `contracts/device.openapi.yaml` 是唯一 wire protocol 输入；
- `parity/operation-policies.json` 镜像 Node generator 的 mutability/retry/secret/MCP policy；
- generated PHP、`parity/manifest.json` 和中英文 API reference 不得手改；
- 新 operation 默认不 retry、不进入 MCP。

## 发现差异

Node 与 PHP 仓库保持 sibling 布局，更新 Node 后运行：

```bash
composer parity:check -- ../UnifyPort-SDK-Nodejs
```

命令会比较完整 contract SHA-256，以及 Node generated catalog 和 PHP manifest 中全部 operation policy，不依赖人工记忆。

## 同步步骤

1. 审查已批准的公开 Node SDK 变更、schema 和 release notes；
2. 比较 Node contract/generator policy；
3. 只复制经批准的公开 `device.openapi.yaml`；
4. policy 变化时更新 `parity/operation-policies.json`；
5. 更新 `parity/source.json` 的公开版本、commit 和 hash；
6. 运行 `composer generate`；
7. 审查 manifest、client methods、resource modules、SchemaCatalog、ApiTypes 和 API reference；
8. Node runtime/error/pagination 变化时才同步手写 runtime；
9. 更新离线测试和中英文文档；
10. 运行完整回归。

## 常见文件映射

| Node 变化 | PHP 检查位置 |
| --- | --- |
| path/operationId/参数/schema | contract、generated output、测试、示例 |
| retry/mutability/secret | operation policies、manifest、runtime tests、parity docs |
| 配置/default | `ClientConfig`、`RetryConfig`、`RequestExecutionOptions` |
| 认证/URL/redirect | `Http/UrlGuard`、`RequestBuilder`、`Runtime` |
| JSON/整数 | `SafeJsonDecoder` |
| error | `src/Exception`、Runtime、文档、测试 |
| pagination | `src/Pagination`、文档、测试 |

新增 operation 必须检查批准依据、operationId、参数/body requiredness、状态码、mutability、retry、secret、整数范围、资源模块、离线测试和生成文档。新增错误行为必须继续屏蔽上游 message/details/body/headers 和 previous exception。

完整回归：

```bash
composer validate --strict
composer generate:check
composer lint
composer analyse
composer test
composer examples:check
composer public:check
composer archive:check
composer parity:check -- ../UnifyPort-SDK-Nodejs
composer audit --locked
git diff --check
```
