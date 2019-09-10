<?php

declare(strict_types=1);

namespace App\Service\Handler;


class NumberHandler extends AbstractHandler  implements HandlerInterface
{
    public function __invoke($value)
    {
        if (!ctype_digit($value)) {
            throw new \Exception('Wrong value type');
        }
        return sprintf($this->getFormat(), $value);
    }

    public function supports($value, array $context = []): bool
    {
        return ctype_digit($value);
    }
}
