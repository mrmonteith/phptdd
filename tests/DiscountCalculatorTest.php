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
