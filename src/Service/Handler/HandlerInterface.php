<?php
declare(strict_types=1);

namespace App\Service\Handler;


interface HandlerInterface
{
    /**
     * @throws \Exception
     */
    public function __invoke($value);

    public function supports($value, array $context = []):bool;
}
