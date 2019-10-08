<?php
declare(strict_types=1);


namespace App\Service;


class StringType extends TypeObject
{
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function get(): string
    {
        return $this->value;
    }
}
