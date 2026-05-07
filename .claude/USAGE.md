# Usage Guide — pp-php-sdk

## Quick Start

This is a PHP SDK library (`mp-plugins/php-sdk`) for MercadoPago Payment Processing. The main entry point is `src/Sdk.php`.

```bash
composer install
vendor/bin/phpunit
```

## Common Tasks

| Task | Command |
|------|---------|
| Install dependencies | `composer install` |
| Run all unit tests | `vendor/bin/phpunit` |
| Run tests with coverage | `composer test` |
| Run specific test | `vendor/bin/phpunit tests/unit/Path/To/TestFile.php` |
| Lint (PSR-2) | `composer lint` |
| Check PHP syntax | `php -l src/File.php` |

## Skills

- `/run-tests` — Run PHPUnit test suite
- `/fix-lint` — Check and fix PHP coding standards (phpcs)
- `/create-spec` — Create a technical spec for a new feature
- `/review-changes` — Review current uncommitted changes
- `/commit` — Prepare a commit (does not execute git write commands)

## Git Permissions

`git add` and `git commit` are intentionally blocked in `.claude/settings.json`. Staging and committing are always manual in this project — Claude assists with preparing the commit message (via `/commit`) but never stages or commits files directly. This prevents accidental inclusion of unintended files in a library consumed by external plugins.

## Project Structure

```
src/
  Sdk.php                    — Main SDK entry point (credentials, entity wiring)
  Common/                    — Shared base classes (AbstractEntity, Config, Manager)
  Entity/
    Exchange/                — Exchange rate entities
    Identification/          — Seller funnel entities
    MerchantOrder/           — Merchant order entities
    Monitoring/              — Datadog event entities
    Notification/            — Notification, Refund, PaymentDetails entities
    Onboarding/              — Onboarding entities
    Payment/                 — Payment, Multipayment, Payer, Item, etc.
    PaymentMethods/          — Payment methods entities
    Preference/              — Checkout preference entities
  HttpClient/
    HttpClient.php           — HTTP client implementation
    HttpClientInterface.php  — HTTP client contract
    Requester/
      CurlRequester.php      — Curl-based HTTP implementation
      RequesterInterface.php — HTTP requester contract
  Interfaces/                — SDK interface contracts
tests/
  unit/                      — PHPUnit unit tests
  integration/               — Integration tests
examples/                    — Usage examples
```

## Adding a New Entity

1. Create class in `src/Entity/{NewDomain}/{ClassName}.php`
2. Follow existing patterns: typed properties, PHPDoc, extend `AbstractEntity` if needed
3. Wire in `src/Sdk.php` if it is a top-level resource
4. Add tests in `tests/unit/Entity/{NewDomain}/{ClassName}Test.php`
5. Mock HTTP via `RequesterInterface` — never make real HTTP calls in tests
