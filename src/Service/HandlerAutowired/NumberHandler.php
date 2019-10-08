<?php

declare(strict_types=1);

namespace App\Service\HandlerAutowired;


use App\Service\Traits\NumberHandlerTrait;

class NumberHandler extends AbstractHandler implements HandlerInterface
{
    use NumberHandlerTrait;
}
