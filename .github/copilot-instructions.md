<!-- .github/copilot-instructions.md - Guidance for AI coding agents working on this repo -->
# Quick instructions for AI coding agents

This repository contains class exercises (HTML, CSS, JS, PHP) organized by lesson folders (`aula1`, `aula2`, ...). The guidance below highlights the concrete patterns and entry points an agent needs to be productive immediately.

## Big picture
- Purpose: collection of classroom exercises for "Desenvolvimento Web 1". Most files are standalone lesson exercises (static HTML/JS/CSS or small PHP scripts).
- Runtime surface: files are intended to run on a local PHP webserver (or LAMP/XAMPP) and some lessons connect to a PostgreSQL database (see `aula11`).

## Important locations and examples
- Forms + handlers example: `aula9/folhaExercicios/exercicio1/ex1.html` -> posts to `aula9/folhaExercicios/exercicio1/ex1.php`. Use these when validating form flow and UI expectations.
- DB example: `aula11/connectdb.php` and `aula11/function.php` show how PostgreSQL is used via `pg_connect`, `pg_query_params`, and `pg_fetch_assoc`.
- Top-level README: `README.md` contains course-level info but no build/test automation.

## Concrete patterns to follow (do not invent)
- File organization: each lesson is an independent folder named `aulaX`. Keep changes local to the relevant `aula` folder unless a global fix is required.
- PHP database access uses the `pg_*` family (procedural). Typical pattern:
  - connection is created in `aula11/function.php` (note: current `connectDatabase()` implementation does not return the connection object; fixers should return the `resource` and handle errors explicitly).
  - parameterized queries use `pg_query_params()`.
- Forms post to a sibling PHP file (relative paths). Preserve this pattern when editing handlers.

## Run / debug steps (explicit)
1. Start a local PHP server from the repository root (good for quick checks of HTML/PHP files):

```powershell
php -S localhost:8000
```

2. To test the `ex1` exercise open `http://localhost:8000/aula9/folhaExercicios/exercicio1/ex1.html` in a browser. Submitting will POST to `ex1.php` and render the result.

3. PostgreSQL-backed lessons (aula11): ensure a local Postgres instance is available and reachable. The repository contains an example connection string in `aula11/function.php`:

```
host=localhost port=5432 dbname=local user=postgres password=unidavi
```

Agents must NOT attempt to use these credentials in production. Treat them as example/dev-only and surface a note to the human if changes are required.

## Examples of issues and how to handle them
- `aula11/function.php`: `connectDatabase()` sets `$connection` but does not return it. A correct fix returns the connection and checks for `false` to handle connection errors. Example change is limited, well-scoped, and safe to propose as a patch.
- Input handling: many PHP handlers take POST values directly (e.g. `ex1.php`). When implementing fixes, prefer minimal, visible improvements: cast numeric inputs (floatval/intval) and use `htmlspecialchars()` on values echoed into HTML.

## Project conventions and constraints
- No build system, no package manager detected. Changes should avoid adding heavyweight dependencies.
- Prefer small, backwards-compatible edits. These are classroom exercises; preserve the pedagogical structure (each exercise is runnable on its own).
- Commit messages should reference the `aula` folder changed and be short: `aula9: fix ex1 form handler`.

## When to ask the human
- If a change requires database schema or credentials modification.
- If a refactor touches multiple `aula` folders or converts procedural code to an architecture pattern (explain pros/cons and get approval).

## Where to look for more examples
- `aula9/folhaExercicios/exercicio1/ex1.html` and `ex1.php` — form → PHP handler flow.
- `aula11` — PostgreSQL access patterns and connection handling.

If anything in these notes is unclear or you'd like me to include more examples (e.g., a safe patch for `connectDatabase()`), tell me which area to expand.
