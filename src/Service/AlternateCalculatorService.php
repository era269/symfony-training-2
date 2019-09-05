<?php


namespace App\Service;


class AlternateCalculatorService implements CalculatorInterface
{
    /**
     * @var int
     */
    private $value;

    /**
     * AlternateCalculatorService constructor.
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }


    /**
     * @param int $a
     * @param int $b
     * @return int
     */
    public function calculate(int $a, int $b): int
    {
        return $a + $b + $this->value;
    }
}
