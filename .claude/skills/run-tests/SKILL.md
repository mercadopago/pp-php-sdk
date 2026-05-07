# Run Tests

## Instructions

Run the PHPUnit test suite for this PHP SDK.

### Steps

1. Ensure dependencies are installed: `composer install` (if `vendor/` is missing)
2. Run the full test suite: `vendor/bin/phpunit`
3. If a specific file or area was changed, also run the targeted test: `vendor/bin/phpunit tests/unit/Path/To/TestFile.php`
4. Report results clearly — pass/fail count with any error output

### Commands

```bash
# Full suite
vendor/bin/phpunit

# Specific test file
vendor/bin/phpunit tests/unit/Path/To/TestFile.php

# With coverage (as configured in composer.json)
composer test
```
