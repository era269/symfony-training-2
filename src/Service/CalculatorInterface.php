<?php


namespace App\Service;


interface CalculatorInterface
{
    /**
     * @param int $a
     * @param int $b
     * @return int
     */
    public function calculate(int $a, int $b): int;
}
