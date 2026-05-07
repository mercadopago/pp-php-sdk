---
paths: ["src/Entity/**/*.php"]
---

# Entity Rules

- One class per file, one entity per class
- Properties must be typed (`string`, `int`, `?float`, etc.) — no `mixed` or untyped properties
- Use `JsonSerializable` or array casting for JSON output — no direct property access from outside
- Follow existing namespace structure: `MercadoPago\PP\Sdk\Entity\{Domain}\{ClassName}`
- Entities are data-only — no business logic, no HTTP calls, no side effects
- New entities must mirror the API JSON response structure with matching property names
- Always add PHPDoc blocks for the class and public methods
- Use `declare(strict_types=1);` at the top of every new file
- Follow existing naming conventions — PascalCase for classes, camelCase for methods/properties
- Lists of sub-entities should use dedicated list classes (see `ItemList`, `TransactionInfoList` patterns)
