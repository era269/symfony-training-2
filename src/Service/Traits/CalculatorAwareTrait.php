<?php


namespace App\Service\Traits;


use App\Service\CalculatorInterface;

trait CalculatorAwareTrait
{
    /**
     * @var CalculatorInterface
     */
    private $calculator;

    /**
     * @return CalculatorInterface
     */
    public function getCalculator(): CalculatorInterface
    {
        return $this->calculator;
    }

    /**
     * @required
     * @param CalculatorInterface $calculator
     */
    public function setCalculator(CalculatorInterface $calculator): void
    {
        $this->calculator = $calculator;
    }
}
