# phptdd
PHP Test-Driven Development Example

# PHP test-driven development example

This repository demonstrates Test-Driven Development (TDD) in PHP using PHPUnit. It’s designed to be recruiter-friendly, transparent, and easy to reproduce.

---

## Directory structure

```text
project-root/
├── src/
│   └── DiscountCalculator.php
├── tests/
│   └── DiscountCalculatorTest.php
├── vendor/
│   └── (Composer dependencies)
├── composer.json
├── phpunit.xml
└── README.md
```

---
# PHP Test-Driven Development Example

This repository demonstrates Test-Driven Development (TDD) in PHP using PHPUnit.

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
