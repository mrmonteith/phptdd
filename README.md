# phptdd
# PHP Test-Driven Development example

This repository demonstrates Test-Driven Development (TDD) in PHP using PHPUnit. It’s designed to be recruiter-friendly, transparent, and easy to reproduce.

⚠️ Note on PHPUnit Deprecation Warning

When running the test suite with PHPUnit 12.5.0 under PHP 8.5.0, you may see:
```
OK, but there were issues!
Tests: N, Assertions: N, PHPUnit Deprecations: 1.
```

```text
This message does not indicate a problem with the project’s code or tests. It is a known upstream issue:
PHPUnit 12.5 currently emits a deprecation notice internally when executed on PHP 8.5, even for trivial tests.
The warning comes from PHPUnit itself, not from any deprecated assertions or practices in this repository.
---
```
## Directory structure

```text
phptdd/
├── README.md              # Clear setup + usage instructions
├── composer.json          # Dependencies + autoload config
├── composer.lock
├── phpunit.xml            # PHPUnit configuration
├── src/                   # Application source code
│   └── DiscountCalculator.php
├── tests/                 # Unit tests
│   ├── DiscountCalculatorTest.php
│   └── ExampleTest.php
└── vendor/                # Composer dependencies (ignored in VCS)
```

---

## Steps
1. Write a failing test in `tests/`.
2. Run PHPUnit → test fails (Red).
3. Write minimal code in `src/` to make the test pass (Green).
4. Refactor code while keeping tests passing.

## Run Tests
```bash
composer install
vendor/bin/phpunit

## Setup

- **Requirements:** PHP 8.1+, Composer, PHPUnit
- **Install dependencies:**
  ```bash
  composer install
  ```

---

## Run tests

```bash
vendor/bin/phpunit
```

---

## Example

DiscountCalculatorTest.php defines expected behavior.
DiscountCalculator.php implements logic to satisfy the test.

## Example code

#### tests/DiscountCalculatorTest.php
```php
<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/DiscountCalculator.php';

class DiscountCalculatorTest extends TestCase {
    public function testTenPercentDiscount(): void {
        $calculator = new DiscountCalculator();
        $result = $calculator->applyDiscount(100, 0.10);
        $this->assertEquals(90, $result);
    }

    public function testRejectsInvalidRate(): void {
        $this->expectException(InvalidArgumentException::class);
        $calculator = new DiscountCalculator();
        $calculator->applyDiscount(100, 1.5);
    }
}
```

#### src/DiscountCalculator.php
```php
<?php

class DiscountCalculator {
    public function applyDiscount(float $amount, float $rate): float {
        if ($rate < 0 || $rate > 1) {
            throw new InvalidArgumentException('Rate must be between 0 and 1');
        }
        return $amount - ($amount * $rate);
    }
}
```

---

## TDD workflow

- **Red:** Write a failing test in `tests/` that expresses the desired behavior.
- **Green:** Implement the minimum logic in `src/` to make the test pass.
- **Refactor:** Improve code design while keeping tests green.
- **Repeat:** Add new tests to drive additional behavior.

---

## Key points for recruiters

- **Separation of concerns:** Clear split between `src/` and `tests/`.
- **Transparency:** README shows install steps, commands, and example code.
- **Reproducibility:** Composer and PHPUnit ensure consistent environment.
- **Discipline:** Demonstrates the Red-Green-Refactor cycle with meaningful tests.

---

## Quick start

- **Clone and install:**
  ```bash
  git clone <your-repo-url>
  cd project-root
  composer install
  ```
- **Run tests:**
  ```bash
  vendor/bin/phpunit
  ```
🧹 Repo Hygiene

This project includes a .gitignore file at the root of the repository to keep the codebase clean and professional. The following items are intentionally excluded from version control:

    /vendor/ → Composer dependencies are reproducible via composer install, so they don’t need to be committed.

    PHPUnit cache files (/.phpunit.cache/, /phpunit.result.cache) → avoids noisy diffs and irrelevant artifacts.

    Environment files (.env, keys, certificates) → prevents leaking credentials or secrets.

    IDE/OS files (.idea/, .vscode/, .DS_Store, Thumbs.db) → keeps the repo consistent across different machines.

    Coverage reports (/coverage/, clover.xml, junit.xml) → generated locally or in CI, not needed in source control.

    Logs (*.log) → runtime artifacts, not source code.

✅ Why This Matters

    Keeps the repository lightweight and focused on source code.

    Ensures reproducibility: anyone cloning the repo can run composer install to get dependencies.

    Protects sensitive information from being accidentally committed.

    Demonstrates professional repo hygiene to recruiters and collaborators.
