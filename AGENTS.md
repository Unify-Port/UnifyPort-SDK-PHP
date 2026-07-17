# AGENTS.md

This file applies to the entire repository.

## Language and comments

- Use Simplified Chinese for collaboration. Keep identifiers, protocol fields, error codes, commands, and code blocks in English.
- English public documentation is canonical. Keep the complete Simplified Chinese counterpart synchronized.
- PHP code uses `declare(strict_types=1);` and PSR-12.
- Add short Chinese comments only where they explain intent, compatibility, external constraints, or risk. Do not narrate the code.

## Public and contract boundaries

- This repository implements only the public UnifyPort Device API.
- `contracts/device.openapi.yaml` is the only wire-protocol input.
- `parity/operation-policies.json` records the language-neutral SDK safety policy mirrored from the public Node SDK.
- Generated files carry a generated header. Change the contract, policy, or generator and run `composer generate`; do not patch generated output by hand.
- Do not add credentials, real account data, private hosts, internal documentation, raw production payloads, or debug logs.
- The public client remains `UnifyPortDeviceClient`; operation method names remain identical to OpenAPI `operationId` values.

## Change workflow

1. Inspect the public Node SDK contract, policy, exports, and tests.
2. Update the local contract/policy baseline only from approved public material.
3. Run `composer generate` and review all generated changes.
4. Update runtime, tests, English docs, and Simplified Chinese docs together.
5. Run `composer validate --strict`, `composer check`, `composer public:check`, and `git diff --check`.

Unknown operations default to no retry. Public exceptions must not retain response bodies, sensitive headers, upstream messages, or previous exceptions.
