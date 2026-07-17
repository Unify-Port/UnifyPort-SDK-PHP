# Getting started

[English](getting-started.md) | [简体中文](zh-CN/getting-started.md)

## Requirements

- 64-bit PHP 8.2 or newer;
- Composer;
- one PSR-18 HTTP client;
- PSR-17 request and stream factories;
- the Device API base URL and API key supplied through a secure runtime configuration.

Install the SDK after Packagist publication:

```bash
composer require unifyport/sdk
```

Install a compatible PSR stack if the application does not already provide one:

```bash
composer require guzzlehttp/guzzle nyholm/psr7
```

## Configure the client

Use environment variables or a secret manager. The API key callback is resolved once per logical operation, so retries reuse one credential while the next operation can observe a rotated credential.

```php
$device = new UnifyPortDeviceClient(new ClientConfig(
    baseUrl: requiredEnv('UNIFYPORT_DEVICE_API_BASE_URL'),
    apiKey: static fn (): string => requiredEnv('UNIFYPORT_DEVICE_API_KEY'),
    httpClient: $httpClient,
    requestFactory: $factory,
    streamFactory: $factory,
));
```

Remote URLs must use HTTPS. Loopback HTTP is available only with `allowInsecureHttp: true` for local development. Base URLs containing userinfo, query, or fragment are rejected.

## Send a request

```php
$result = $device->listProviderRegions([
    'params' => [
        'path' => ['provider' => 'whatsapp'],
    ],
]);

foreach ($result->data['data']['regions'] as $region) {
    echo $region['region'];
}
```

Use `docs/api-reference.md` to find every operationId, HTTP path, required-input status, retry classification, and secret classification. Request and response fields remain defined by `contracts/device.openapi.yaml`; `SchemaCatalog` exposes the committed component schemas without inventing PHP-specific business definitions.

## Handle failures safely

Inspect only filtered exception properties such as `status`, `apiCode`, and `requestId`. Never log the request body or API key. A server message can echo sensitive input, so the SDK intentionally replaces it with a stable local message.

## Run the offline example

```bash
composer install
php -r '$result = require "examples/offline-demo.php"; var_export($result);'
composer examples:check
```

The example uses a local fake PSR-18 client and synthetic data.
