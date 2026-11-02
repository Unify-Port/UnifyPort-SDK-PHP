# 参与贡献

[English](CONTRIBUTING.md) | [简体中文](CONTRIBUTING.zh-CN.md)

```bash
composer install
composer check
```

使用 PHP 8.2+、PSR-12，并在每个 PHP 源文件启用 `declare(strict_types=1);`。

不要直接编辑 `src/Generated`、生成的 `src/Api`、`parity/manifest.json` 或 `docs/api-reference.md`。应修改经批准的公开 contract、语言无关 policy 或 generator，再运行 `composer generate`。

所有公开行为变化都要增加离线测试。注释使用简短中文，只解释设计意图、兼容边界、外部限制或风险。

提交前必须确认：只包含公开 Device API；不含 credential、真实数据、内部 host、私有文档和调试输出；中英文文档同步；已运行 `composer validate --strict`、`composer check`、`composer public:check`、`git diff --check`；同步 Node 时已运行 `composer parity:check -- ../UnifyPort-SDK-Nodejs`；有意差异已记录。
