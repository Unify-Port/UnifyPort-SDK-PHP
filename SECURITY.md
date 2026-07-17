# Security policy

[English](SECURITY.md) | [简体中文](SECURITY.zh-CN.md)

## Reporting a vulnerability

Please report vulnerabilities privately through the repository's GitHub Security Advisory feature. Do not open a public issue containing credentials, exploit details, account data, request/response bodies, or private infrastructure information.

Include the affected SDK version, a minimal synthetic reproduction, expected behavior, and security impact. Replace all credentials, account identifiers, messages, URLs, and personal data with obvious placeholders.

## Supported boundary

The SDK protects API-key origin/path confinement, redirect expectations, safe retry classification, response limits, filtered public exception fields, unsafe JSON integers, and cursor loop limits. Applications remain responsible for secret storage, finite transport timeouts, and configuring the injected PSR-18 client not to follow redirects.

PHP can retain function arguments in engine-generated exception traces even when an SDK exception message and properties are redacted. Use credential callbacks, enable `zend.exception_ignore_args=On` in production, and never dump or publish exception traces, requests, or responses.

Never attach production logs or `.env` files to a report.
