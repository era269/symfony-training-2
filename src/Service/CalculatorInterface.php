<?php


namespace App\Service;


interface CalculatorInterface
{
    public function calculate(int $a, int $b): int;
}
