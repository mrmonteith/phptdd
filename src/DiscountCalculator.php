<?php
namespace Mmonteith\PhpTddExample;

class DiscountCalculator
{
    public function applyDiscount(float $price, float $percent): float
    {
        if ($percent < 0 || $percent > 100) {
            throw new \InvalidArgumentException("Discount percent must be between 0 and 100.");
        }
        return $price - ($price * $percent / 100);
    }
}

