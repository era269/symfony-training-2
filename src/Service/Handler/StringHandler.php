<?php

declare(strict_types=1);

namespace App\Service\Handler;


class StringHandler extends AbstractHandler  implements HandlerInterface
{

    public function __invoke($value)
    {
        if (!is_string($value)) {
            throw new \Exception('Wrong value type');
        }

        return sprintf($this->getFormat(), $value);
    }


    public function supports($value, array $context = []): bool
    {
        return is_string($value);
    }

}
