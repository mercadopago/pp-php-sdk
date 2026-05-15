# pp-php-sdk

PHP SDK library (`mp-plugins/php-sdk`) for MercadoPago Payment Processing — provides typed entities for payments, notifications, exchanges, and refunds, plus HTTP client abstractions. Consumed by MercadoPago plugins (PrestaShop, etc.).

## Setup

Pure library — no framework, no web server. Install with:

```bash
composer install
```

## Architecture

- **Namespace**: `MercadoPago\PP\Sdk\` (PSR-4, maps to `src/`)
- **Main entry**: `src/Sdk.php` — initializes the SDK with credentials and exposes domain entities
- **Entity pattern**: one class per domain concept in `src/Entity/{Domain}/` — data-only classes mirroring JSON structures with typed properties. No business logic.
- **HTTP layer**: `src/HttpClient/HttpClient.php` wraps `RequesterInterface`. `CurlRequester` is the default implementation. To mock in tests, inject a custom `RequesterInterface`.
- **Shared base**: `src/Common/` — abstract entities, config, constants, manager
- **Exceptions**: `src/Exceptions/` — SDK-specific exceptions. `ApiException extends \Exception` is thrown on failed API responses and exposes `getErrorCode()` (CPP_AT), `getApiStatus()`, and `getOriginalMessage()` (@internal, server-side logging only). Backward compatible with existing `catch (\Exception $e)` blocks.
- **Contracts**: `src/Interfaces/` — SDK interface contracts

## Key Rules

- **Entities are data classes** — no business logic, no HTTP calls. Mirror the API JSON structure with typed properties.
- **HTTP lives in HttpClient only** — never add `curl_*` functions or HTTP logic outside `src/HttpClient/`. Use `RequesterInterface` for testability.
- **Tests must mock HTTP** — use `RequesterInterface` mocks, never make real HTTP calls in unit tests.
- **Semver versioning** — version is tracked in `composer.json`.

## Commands

```bash
# Install dependencies
composer install

# Run unit tests
vendor/bin/phpunit

# Run tests with coverage
composer test

# Run a specific test
vendor/bin/phpunit tests/unit/Path/To/TestFile.php

# Lint (PSR-2)
composer lint
```

## Adding a New Entity

1. Create class in `src/Entity/{NewDomain}/` following existing patterns (typed properties, PHPDoc blocks)
2. Add tests in `tests/unit/Entity/{NewDomain}/`
3. If the entity is a top-level SDK resource, wire it in `src/Sdk.php`

<!-- CLAUDIFY:MANAGED:START -->
<!-- This block is managed by claudify. Manual edits may be overwritten. -->
<!-- CLAUDIFY:MANAGED:END -->
