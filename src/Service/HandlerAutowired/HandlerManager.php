<?php

declare(strict_types=1);

namespace App\Service\HandlerAutowired;


class HandlerManager implements HandlerInterface
{
    /**
     * @var HandlerInterface[]
     */
    private $handlers;

//    public function __construct(iterable $handlers )
//    {
//        $this->handlers = $handlers;
//    }
//
    public function __invoke($value, $context = []): string
    {
        return ($this->getHandler($value, $context))($value);

    }

    public function addHandler(HandlerInterface $handler)
    {
        $this->handlers[] = $handler;
    }

    private function getHandler($value, $context): HandlerInterface
    {
        foreach ($this->handlers as $handler) {
            if ($handler->supports($value, $context)) {
                return $handler;
            }
        }
    }

    public function supports($value, array $context = []): bool
    {
        return null !== $this->getHandler($value, $context);
    }


}
