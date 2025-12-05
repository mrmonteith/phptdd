# Test-Driven Development (TDD)

## 🔎 What is TDD?
**Test-Driven Development (TDD)** is a software development practice where you write tests before writing the actual code.  
It follows a short cycle known as **Red → Green → Refactor**:

1. **Red** → Write a failing test for a new feature or behavior.  
2. **Green** → Write the minimal code needed to make the test pass.  
3. **Refactor** → Clean up the code and tests while keeping all tests green.

---

## ⚙️ Benefits of TDD
- **Higher code quality** → Encourages simple, modular designs and reduces defects.  
- **Confidence in changes** → Tests act as a safety net when refactoring or adding features.  
- **Faster debugging** → Failures are caught early, close to where they’re introduced.  
- **Living documentation** → Tests describe expected behavior in executable form.

---

## ⚠️ Common Pitfalls
- Writing too many tests at once instead of small, incremental steps.  
- Tests that are too trivial (e.g., testing getters/setters).  
- Poor maintenance of the test suite, leading to slow or abandoned tests.

---

## 📖 Example in Practice

### Step 1: Write a failing test
```php
public function testApplyDiscountReducesPrice(): void
{
    $calc = new DiscountCalculator();
    $result = $calc->applyDiscount(100.0, 10.0);

    $this->assertEqualsWithDelta(90.0, $result, 0.0001);
}
