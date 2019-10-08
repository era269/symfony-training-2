<?php

declare(strict_types=1);

namespace App\Service\Handler;


use App\Service\NumberType;
use App\Service\StringType;
use App\Service\Traits\StringHandlerTrait;

class StringHandler extends AbstractHandler  implements HandlerInterface
{
    use StringHandlerTrait;

}
