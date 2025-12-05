<?php
class DiscountCalculator {
    public function applyDiscount(float $amount, float $rate): float {
        if ($rate < 0 || $rate > 1) {
            throw new InvalidArgumentException("Rate must be between 0 and 1");
        }
        return $amount - ($amount * $rate);
    }
}
