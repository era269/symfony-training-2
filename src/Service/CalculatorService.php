<?php


namespace App\Service;


class CalculatorService implements CalculatorInterface
{
    public function calculate(int $a, int $b): int
    {
        return $a + $b;
    }
}
