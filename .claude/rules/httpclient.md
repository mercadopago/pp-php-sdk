---
paths: ["src/HttpClient/**/*.php"]
---

# HTTP Client Rules

- `HttpClientInterface` and `RequesterInterface` are contracts — do not break backward compatibility
- New HTTP implementations must implement `RequesterInterface`
- Never add business logic to `HttpClient` — only HTTP mechanics (request building, response parsing, error handling)
- Never use `curl_*` functions directly outside of `CurlRequester` — all curl usage is encapsulated there
- Keep the HTTP layer thin — it translates SDK calls into HTTP requests and responses, nothing more
- Any new HTTP feature must be testable via `RequesterInterface` mock injection
- Response handling and error mapping belong here, not in entities
