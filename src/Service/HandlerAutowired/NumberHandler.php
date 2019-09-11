<?php

declare(strict_types=1);

namespace App\Service\HandlerAutowired;


class NumberHandler extends AbstractHandler  implements HandlerInterface
{
    public function __invoke($value)
    {
//        die(var_dump($value));
        if (!ctype_digit($value)) {
            throw new \Exception('Wrong value type');
        }
        return sprintf($this->getFormat() . $this->getMessage(), $value);
    }

    public function supports($value, array $context = []): bool
    {
        return ctype_digit($value);
    }
}
