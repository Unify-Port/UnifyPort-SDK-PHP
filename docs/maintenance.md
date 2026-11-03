# Maintenance and Node synchronization

[English](maintenance.md) | [简体中文](zh-CN/maintenance.md)

## Source-of-truth rules

- The public Node SDK is the behavior baseline.
- `contracts/device.openapi.yaml` is the only wire-protocol input.
- `parity/operation-policies.json` mirrors the Node generator's explicit mutability, retry, secret, and MCP policy.
- Generated PHP files, `parity/manifest.json`, and `docs/api-reference.md` are derived artifacts and must not be edited manually.
- Unknown operations default to no retry and no MCP exposure.

## Detecting a Node change

Keep the Node and PHP repositories as siblings, update the Node checkout, then run:

```bash
composer parity:check -- ../UnifyPort-SDK-Nodejs
```

The command compares:

1. the complete Device OpenAPI contract SHA-256;
2. all 78 generated Node operation policies against the PHP manifest;
3. operation presence and policy fields rather than relying on a human checklist.

Any failure requires review; do not copy files blindly.

## Synchronization workflow

1. Review the approved public Node SDK change, OpenAPI schema, and release notes.
2. Compare the Node contract and generator policy with the PHP baseline.
3. Copy only the approved public `contracts/device.openapi.yaml` snapshot.
4. Update `parity/operation-policies.json` when the Node policy changed.
5. Update `parity/source.json` with the public Node package version, commit, and new contract SHA-256.
6. Run `composer generate`.
7. Review `parity/manifest.json`, client methods, resource modules, `SchemaCatalog`, `ApiTypes`, and generated API reference.
8. Port runtime behavior only when the Node transport/error/pagination implementation changed.
9. Add or update offline tests and English/Chinese documentation.
10. Run the full regression commands below.

## Files usually involved

| Node change | PHP files to inspect |
| --- | --- |
| Path, operationId, parameter, request, response, schema | `contracts/device.openapi.yaml`, generator output, tests, API examples |
| Retry/mutability/secret policy | `parity/operation-policies.json`, manifest, runtime tests, parity docs |
| Client config/default | `ClientConfig`, `RetryConfig`, `RequestExecutionOptions`, README/docs/tests |
| Authentication/URL/redirect behavior | `Http/UrlGuard`, `Http/RequestBuilder`, `Http/Runtime`, security tests |
| Response parsing/integer handling | `Serialization/SafeJsonDecoder`, runtime tests |
| Public error type or field | `src/Exception`, `Http/Runtime`, README, parity table, tests |
| Pagination behavior | `src/Pagination`, README/docs/tests |
| Node-only MCP policy | parity manifest/docs; no PHP MCP runtime code |

## New operation checklist

- [ ] Public schema and release notes are approved.
- [ ] Stable unique `operationId` exists.
- [ ] Method/path and path/query/body requiredness are correct.
- [ ] Success/error statuses and empty-body behavior are represented.
- [ ] Mutability is reviewed; non-obvious destructive behavior is explicit.
- [ ] Retry safety is explicitly proven or remains disabled.
- [ ] Secret input/output flags are reviewed.
- [ ] Integer formats and ranges are safe across Node and PHP.
- [ ] The operation appears in the flat client and the correct tag API module.
- [ ] Request construction and response parsing have offline tests.
- [ ] Generated reference and examples are updated.

## New field or schema checklist

- [ ] Required/optional/null semantics match the public contract.
- [ ] `int64`/`uint64`, enum, date-time, URI, and free-form objects are reviewed.
- [ ] No internal field or unpublished behavior was inferred.
- [ ] `SchemaCatalog` regenerated without a second PHP business definition.
- [ ] A fixture covers any new serialization boundary.

## New error behavior checklist

- [ ] HTTP status remains visible.
- [ ] API code remains length-limited and character-allowlisted.
- [ ] Request ID remains length-limited and character-allowlisted.
- [ ] Upstream message/details/body/headers and previous exception remain absent.
- [ ] Timeout, network, parse, and API errors remain distinguishable.

## Regression commands

```bash
composer validate --strict
composer install --no-interaction --prefer-dist
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

Before release, inspect all tracked files and the Composer archive for credentials, absolute local paths, debug output, private hosts, and unexpected generated files.
