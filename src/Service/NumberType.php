<?php
declare(strict_types=1);


namespace App\Service;


class NumberType extends TypeObject
{
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function get(): int
    {
        return $this->value;
    }
}
