<?php

declare(strict_types=1);

namespace App\Service\HandlerAutowired;


use App\Service\Traits\StringHandlerTrait;

class StringHandler extends AbstractHandler  implements HandlerInterface
{
    use StringHandlerTrait;
}
