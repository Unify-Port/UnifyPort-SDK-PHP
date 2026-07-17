# 安全策略

[English](SECURITY.md) | [简体中文](SECURITY.zh-CN.md)

请通过仓库的 GitHub Security Advisory 私下报告漏洞。不要在公开 issue 中提交凭据、利用细节、账号数据、完整请求/响应或私有基础设施信息。

报告应包含受影响版本、使用虚构数据的最小复现、预期行为和安全影响。所有 credential、账号 ID、消息、URL 和个人数据都要替换成明显占位值。

SDK 覆盖 API key origin/path 隔离、redirect 配置预期、安全 retry 分类、响应上限、公开异常字段脱敏、不安全 JSON 整数和 cursor 循环限制。应用仍负责 secret 存储、有限 transport timeout，并负责关闭注入 PSR-18 client 的 redirect。

即使 SDK 已脱敏异常 message 和公开字段，PHP engine 生成的 exception trace 仍可能保留函数参数。建议使用 credential callback，生产环境开启 `zend.exception_ignore_args=On`，且不要 dump 或公开 exception trace、request、response。

不要附加生产日志或 `.env` 文件。
