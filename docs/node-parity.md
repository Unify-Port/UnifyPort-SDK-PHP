# Node/PHP parity

[English](node-parity.md) | [简体中文](zh-CN/node-parity.md)

## Baseline

| Item | Baseline |
| --- | --- |
| Node package | `@unifyport/sdk-node` `0.1.2` |
| Public Node commit | `a8e00abdf39abefd467491166dffb03a09e9e81d` |
| Contract SHA-256 | `86a38f7d743b7e72c3a2c1521a9985cc61ac907f72712e671b70aa8d69734c44` |
| Operations | 64 |
| Component schemas | 69 |
| Resource tags | 11 |

`parity/source.json` stores the source baseline. `parity/manifest.json` is generated and contains every operation's method, path, tag, parameters, request-body requirement, retry flag, mutability, secret input/output flags, and MCP classification.

## Module mapping

| Node SDK | PHP SDK | Status |
| --- | --- | --- |
| `contracts/device.openapi.yaml` | `contracts/device.openapi.yaml` | Exact public snapshot |
| `UnifyPortDeviceClient` | `UnifyPortDeviceClient` | 64 identical operationId methods |
| generated `schema.ts` | generated `SchemaCatalog` + `ApiTypes` | All 69 schemas traceable; directional PHPStan aliases generated |
| generated `operation-catalog.ts` | generated `OperationCatalog` | Method/path/policy aligned |
| generated flat client | generated client trait + 11 tag API modules | 64 operationId/method/path mappings exact; modules are PHP delegates |
| `DeviceClientConfig` | `ClientConfig` | Same core values/defaults; PSR dependencies explicit |
| `RetryConfig` | `RetryConfig` | Same defaults and hard limits |
| `RequestExecutionOptions` | `RequestExecutionOptions` | timeout and retry tightening aligned; no AbortSignal |
| `ApiResult<T>` | `ApiResult<T>` | data/status/requestId/response aligned |
| `runtime.ts` | `Http\Runtime` + `RequestBuilder` + `SafeJsonDecoder` | Security and transport behavior ported |
| Node error classes | PHP `Exception` namespace | One-to-one semantic mapping below |
| `paginateCursor` | `CursorPaginator::paginate` | Cursor/maxPages behavior aligned; cancellation differs |
| `deviceOperations` | `OperationCatalog::all()` | Public operation metadata |
| generated API Reference | `docs/api-reference.md` | Generated from the same contract/policy |

## Resource coverage

| Resource | Operations | PHP API module |
| --- | ---: | --- |
| Workspace | 2 | `WorkspaceApi` |
| API Keys | 4 | `ApiKeysApi` |
| Providers | 1 | `ProvidersApi` |
| Accounts | 5 | `AccountsApi` |
| Account Auth | 8 | `AccountAuthApi` |
| Account Runtime | 4 | `AccountRuntimeApi` |
| Conversations | 13 | `ConversationsApi` |
| Contacts | 6 | `ContactsApi` |
| Groups | 10 | `GroupsApi` |
| Messages | 5 | `MessagesApi` |
| Webhook Endpoints | 6 | `WebhookEndpointsApi` |

No public Device API operation is omitted.

## Exception mapping

| Node | PHP |
| --- | --- |
| `UnifyPortError` | `UnifyPortException` |
| `UnifyPortConfigurationError` | `UnifyPortConfigurationException` |
| `UnifyPortNetworkError` | `UnifyPortNetworkException` |
| `UnifyPortTimeoutError` | `UnifyPortTimeoutException` |
| `UnifyPortAbortError` | `UnifyPortAbortException` |
| `UnifyPortResponseParseError` | `UnifyPortResponseParseException` |
| `UnifyPortPaginationError` | `UnifyPortPaginationException` |
| `UnifyPortApiError` | `UnifyPortApiException` |

PHP uses `apiCode` instead of native `Exception::getCode()` because the API code is a string.

## Aligned behavior within the PHP request surface

- `X-Api-Key` is injected only from client configuration and caller-provided Authorization/Cookie/API-key headers are discarded.
- Remote HTTP, URL userinfo, query, and fragment are rejected; explicit loopback HTTP is supported.
- Request paths and operation names come from the public contract.
- The credential provider is resolved once per logical operation and reused across retries.
- Only the 19 explicit safe operations retry; writes do not gain retry from their HTTP method.
- Retry statuses are `408`, `429`, `502`, `503`, and `504`, plus transport failures; `Retry-After` and bounded jitter are supported.
- Default timeout/retry/delay/response-limit values match Node.
- Successful JSON keeps the complete envelope; 204 responses become `null` in PHP.
- JSON integers outside JavaScript's safe range become canonical decimal strings, including decimal and exponent forms.
- Error code/request ID allowlists and length limits match Node; body/message/details/headers/previous errors are not exposed.
- Response bodies are read with an actual byte limit rather than trusting `Content-Length`.
- Pagination rejects missing/repeated cursors and enforces the same default page limit.

## Intentional language/ecosystem differences

| Difference | Reason and impact |
| --- | --- |
| `undefined` success data becomes `null` | PHP has no `undefined`; applies to 204 operations. |
| Plain arrays instead of generated runtime DTOs | Node also returns plain JSON objects; OpenAPI, generated PHPDoc, and `SchemaCatalog` remain the type source. |
| Tag API modules are added | PHP convenience layer; every method delegates to the same flat client operation. |
| Advanced `FetchOptions` hooks are not exposed | PHP accepts the generated path/query/body/header shape but not Node-specific serializer, middleware, `fetch`, `baseUrl`, `redirect`, or `parseAs` overrides; common behavior remains centralized. |
| Routing and framing headers are reserved | PHP discards authentication, `Host`, forwarding, hop-by-hop, and message-framing overrides because PSR transports do not enforce one common forbidden-header policy. |
| Base URL hosts are ASCII | Supply IDNs in punycode form; ambiguous host characters are rejected before PSR transport. |
| No `AbortSignal` equivalent | Synchronous PHP/PSR-18 has no standard cancellation signal. `UnifyPortAbortException` is reserved for future adapters; cursor cancellation is not exposed. |
| PHP timeout is cooperative | `TimeoutAwareClientInterface` receives the remaining transport budget. A synchronous credential callback, plain `sendRequest()`, or PSR-7 `read()` cannot be interrupted while blocked; the SDK detects expiry after those calls return and directly bounds SDK-owned retry/backoff. |
| Redirect configuration belongs to the injected client | PSR-18 exposes no per-request redirect flag. Applications must disable redirects. A returned 3xx is treated as an API error, but the SDK cannot undo redirects already followed by a misconfigured client. |
| Buffered PSR-7 response body remains readable | Node documents its response body as consumed; PHP returns a buffered response to avoid implementation-specific stream state. Business data must still use `ApiResult::data`. |

The known transport gaps include timeout interruption, cancellation, and redirect ownership. They are documented rather than described as fully equivalent.

## Unsupported or deferred items

- MCP Server: intentionally outside the PHP SDK repository and package boundary.
- Webhook signature verification: the public contract does not define a complete algorithm.
- Generic raw request method: intentionally excluded to preserve credential and operation-policy boundaries.
- Async PHP client: not included; the public package targets synchronous PSR-18.
