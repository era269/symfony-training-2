<?php

declare(strict_types=1);

namespace App\Service\Handler;


use App\Service\NumberType;
use App\Service\Traits\NumberHandlerTrait;

class NumberHandler extends AbstractHandler  implements HandlerInterface
{
    use NumberHandlerTrait;
}
