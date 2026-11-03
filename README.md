# UnifyPort PHP SDK

[English](README.md) | [简体中文](README.zh-CN.md)

Official PHP 8.2+ SDK for the public UnifyPort Device API. It exposes all 78 public operations through a single `UnifyPortDeviceClient`, optional resource-oriented API modules, a consistent result and exception model, safe retries, cooperative operation deadlines, response limits, and cursor pagination.

The SDK tracks approved public Node source `ce60499` (`0.4.0` package metadata at that commit). The OpenAPI contract and generated parity manifest are committed so future Node changes can be detected automatically.

## Status and scope

- PHP `8.2+` on a 64-bit runtime;
- Composer with PSR-4 autoloading;
- PSR-18 HTTP client and PSR-17 request/stream factories supplied by the application;
- all 78 Device API operations and 225 public component schemas;
- generated per-operation request/response PHPStan types, including input/output integer semantics;
- `X-Api-Key` authentication only;
- JSON request and response bodies;
- MIT license.

The SDK source code follows the Node package's MIT license. The exact contract snapshot retains its upstream `LicenseRef-Proprietary` metadata for the exposed API; it does not override the SDK source license. See [Licensing notice](NOTICE.md) for the remaining API-terms documentation follow-up.

This repository does not include the private MCP package from the Node workspace. It does not infer APIs or webhook verification behavior that are absent from the public contract.

## Installation

After the package is published to Packagist:

```bash
composer require unifyport/sdk
```

The application must also provide a PSR-18 client and PSR-17 factories. One possible combination is:

```bash
composer require guzzlehttp/guzzle nyholm/psr7
```

## Client initialization

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

Credentials must come from the runtime environment or another secret provider. Do not place them in source code, examples, logs, exception messages, or committed `.env` files. Prefer a callback over a literal API key, enable `zend.exception_ignore_args=On` in production, and never dump exception traces because PHP may retain call arguments. Configure the injected client not to follow redirects and not to throw on HTTP error statuses. Authentication, `Host`, forwarding, hop-by-hop, and message-framing headers are reserved and discarded from per-call custom headers.

## Calling operations

Operation names remain identical to OpenAPI `operationId` and the Node SDK methods. Path/query parameters are under `params`, custom HTTP headers use the top-level `headers` key, and JSON data is under `body`. The compatibility-only `params.header` form remains accepted, but new code should follow Node's top-level header shape.

```php
$workspace = $device->getWorkspace();
echo $workspace->data['data']['name'];
echo $workspace->status;

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

Resource-oriented accessors delegate to the same generated operation methods and do not define a second protocol:

```php
$contacts = $device->contacts()->listContacts([
    'params' => [
        'path' => ['account_id' => 'acc_example'],
        'query' => ['limit' => 100],
    ],
]);
```

The complete generated operation list is in [Device API operation reference](docs/api-reference.md).

## Results and errors

Every operation returns `ApiResult<T>`:

| Property | Meaning |
| --- | --- |
| `data` | Complete decoded JSON envelope; resource data is usually under `data['data']` |
| `response` | PSR-7 response with the buffered body |
| `status` | HTTP status |
| `requestId` | Validated request ID from the response body or header |

Catch the specific exception type you can handle:

```php
use UnifyPort\Sdk\Exception\UnifyPortApiException;
use UnifyPort\Sdk\Exception\UnifyPortNetworkException;
use UnifyPort\Sdk\Exception\UnifyPortResponseParseException;
use UnifyPort\Sdk\Exception\UnifyPortTimeoutException;

try {
    $workspace = $device->getWorkspace();
} catch (UnifyPortApiException $error) {
    // apiCode, status, and requestId are filtered; upstream message/details are not retained.
    error_log(sprintf('UnifyPort request failed: %s (%d)', $error->apiCode, $error->status));
} catch (UnifyPortTimeoutException $error) {
    error_log(sprintf('UnifyPort request exceeded %dms', $error->timeoutMs));
} catch (UnifyPortResponseParseException | UnifyPortNetworkException $error) {
    error_log('UnifyPort request could not be completed');
}
```

Public exception properties/messages intentionally omit the upstream body, sensitive headers, original message/details, and previous exception. PHP engine traces are outside this object-level guarantee; do not dump them and enable `zend.exception_ignore_args=On`.

## Timeout, retry, and response limits

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

Configured defaults match the Node SDK: a 30-second deadline, two retries for explicitly safe operations, 200ms base delay, 5-second maximum delay, and an 8 MiB response limit. Per-call retry options can only disable or reduce the configured budget. Writes and operations absent from the retry allowlist never retry automatically.

PHP's synchronous interfaces make this a cooperative deadline, not an `AbortSignal` equivalent. `TimeoutAwareClientInterface` passes the remaining transport budget to an adapter; a plain PSR-18 client blocked in `sendRequest()`, a credential callback, or a PSR-7 stream blocked in `read()` cannot be interrupted by the SDK. Those calls are checked after they return, while SDK-owned retry/backoff is bounded directly. See [Node parity](docs/node-parity.md).

## Cursor pagination

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
    // Process one contact at a time.
}
```

The paginator stops on missing/repeated cursors and has a default 10,000-page safety limit.

## Custom PSR-18 client

The SDK does not depend on one HTTP implementation. Inject any PSR-18 client and PSR-17 request/stream factories. The application is responsible for disabling redirects and configuring a finite transport timeout. To propagate the remaining operation budget into transport, implement `UnifyPort\Sdk\Http\TimeoutAwareClientInterface` in an adapter around the chosen client.

## Local development and tests

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

`examples/offline-demo.php` is executed by `composer examples:check` and never makes a network request.

## Version and Node compatibility

- OpenAPI `operationId` values are public PHP method names.
- Removing or renaming an operation, adding required input, or narrowing a field is a breaking change.
- New optional fields still require release notes and generated parity review.
- `parity/manifest.json` records the full operation surface and policy snapshot.
- The synchronization workflow is documented in [Maintenance](docs/maintenance.md).
- Deliberate language differences and current support status are documented in [Node parity](docs/node-parity.md).

## Contributing

Read [CONTRIBUTING.md](CONTRIBUTING.md) before changing the contract, generator, runtime, or public API. Security reports should follow [SECURITY.md](SECURITY.md).

The synchronization baseline is approved Node source `ce60499`, not a claim that npm has released these capabilities. No package is published by this update. See [Contract update](docs/contract-update.md).

[Facebook channel support](docs/facebook.md) covers session authorization, supported messages and standard callbacks.
