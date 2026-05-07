# Fix Lint

## Instructions

Check PHP syntax and PSR-2 coding standards, then fix any issues.

### Steps

1. Run `composer lint` to check coding standards via phpcs (PSR-2)
2. If phpcs reports errors, fix them in the source files
3. Run `php -l` on modified PHP files to verify syntax
4. Ensure all new files have `declare(strict_types=1);`
5. Verify PHPDoc blocks exist on public methods
6. Re-run `composer lint` to confirm all issues are resolved

### Commands

```bash
# PSR-2 coding standards check
composer lint

# Or directly
vendor/bin/phpcs -q --standard=PSR2 src

# Syntax check a specific file
php -l src/Entity/Domain/ClassName.php
```
