# Review Changes

## Instructions

Review all uncommitted changes in the working tree.

### Steps

1. Run `git status` to see modified and untracked files
2. Run `git diff` to see unstaged changes
3. Run `git diff --cached` to see staged changes
4. For each changed file:
   - Summarize what changed
   - Check architecture compliance (entities = data only, HTTP in HttpClient only)
   - Verify typed properties — no `mixed` or untyped
   - Verify PHPDoc blocks on public methods
   - Check for missing tests
   - Look for security issues (hardcoded credentials, exposed keys)
5. Run `vendor/bin/phpunit` to ensure tests still pass
6. Provide a summary with actionable feedback
