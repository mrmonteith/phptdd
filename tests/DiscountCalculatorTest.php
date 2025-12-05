<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Mmonteith\PhpTddExample\DiscountCalculator;

final class DiscountCalculatorTest extends TestCase
{
    public function testApplyDiscountReducesPrice(): void
    {
        $calc = new DiscountCalculator();
        $result = $calc->applyDiscount(100.0, 10.0);

        // Use delta for float comparison to avoid deprecation warnings
        $this->assertEqualsWithDelta(90.0, $result, 0.0001);
    }

    public function testZeroPercentDiscountReturnsOriginalPrice(): void
    {
        $calc = new DiscountCalculator();
        $result = $calc->applyDiscount(200.0, 0.0);

        $this->assertEqualsWithDelta(200.0, $result, 0.0001);
    }

    public function testFullDiscountReturnsZero(): void
    {
        $calc = new DiscountCalculator();
        $result = $calc->applyDiscount(50.0, 100.0);

        $this->assertEqualsWithDelta(0.0, $result, 0.0001);
    }

    public function testInvalidPercentThrowsException(): void
    {
        $calc = new DiscountCalculator();

        $this->expectException(\InvalidArgumentException::class);
        $calc->applyDiscount(100.0, 150.0);
    }
}

