# 许可说明

PHP SDK 源码和生成的客户端实现沿用公开基准 `unifyport-sdk-node` 的 MIT License。

`contracts/device.openapi.yaml` 是用于 parity 的精确快照，保留上游 OpenAPI `info.license` 中的 `LicenseRef-Proprietary`。按照 OpenAPI 3.1，该字段记录被暴露 API 的许可信息，不会覆盖本仓库中 SDK 源码适用的 MIT License。为避免破坏已记录的 contract hash，本仓库没有单方面改写该字段。

`LicenseRef-Proprietary` 是自定义 SPDX license reference。API 所有者仍应公开或链接相应的 API 条款，便于使用者解析该引用；这是 API 条款文档的后续事项，不是 PHP SDK 源码的第二套许可证。

本项目不捆绑第三方生产实现；依赖项分别遵循各自许可证。
