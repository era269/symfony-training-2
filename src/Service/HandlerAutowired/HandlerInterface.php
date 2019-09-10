<?php
declare(strict_types=1);

namespace App\Service\HandlerAutowired;


interface HandlerInterface
{
    public function __invoke($value);

    public function supports($value, array $context = []):bool;
}
