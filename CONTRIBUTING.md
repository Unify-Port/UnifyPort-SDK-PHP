# Contributing

[English](CONTRIBUTING.md) | [简体中文](CONTRIBUTING.zh-CN.md)

## Development setup

```bash
composer install
composer check
```

Use PHP 8.2+ and keep source PSR-12 compliant. Add `declare(strict_types=1);` to every PHP source file.

## Contract and generated files

Do not edit `src/Generated`, generated files in `src/Api`, `parity/manifest.json`, or `docs/api-reference.md` directly. Update the approved public contract, language-neutral policy, or `scripts/generate.php`, then run `composer generate`.

Every public behavior change requires offline tests. Keep comments short and in Simplified Chinese; comments explain only design intent, compatibility, external constraints, or risk.

## Pull-request checklist

- preserve the public Device API scope;
- avoid credentials, real data, internal hosts, private documentation, and debug output;
- update complete English and Simplified Chinese documentation together;
- run `composer validate --strict`, `composer check`, `composer public:check`, and `git diff --check`;
- run `composer parity:check -- ../UnifyPort-SDK-Nodejs` for Node synchronization work;
- describe any intentional Node/PHP difference.
