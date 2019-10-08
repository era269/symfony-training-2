<?php

declare(strict_types=1);

namespace App\Service\Events;


use Psr\EventDispatcher\EventDispatcherInterface;

class EventDispatcher implements EventDispatcherInterface
{
    /**
     * @var ListenerInterface[]
     */
    private $listeners;

    public function dispatch(object $event)
    {
        if (!$event instanceof Event) {
            throw new \Exception('wrong class');
        }

        foreach ($this->listeners as $listener) {
            if ($event->isPropagationStopped()) {
                break;
            }
            if ($listener->supports($event)) {

                $listener($event);
            }
        }
    }

    public function addListener(ListenerInterface $listener)
    {
        $this->listeners[] = $listener;
    }
}
