<?php


namespace App\Service;


interface CalculatorAwareInterface
{
    public function getCalculator():CalculatorInterface;

    public function setCalculator(CalculatorInterface $calculator):void;
}
