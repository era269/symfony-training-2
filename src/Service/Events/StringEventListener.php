<?php

declare(strict_types=1);

namespace App\Service\Events;


use App\Service\Events\Event;
use App\Service\Events\ListenerInterface;
use App\Service\StringType;

class StringEventListener implements ListenerInterface
{
    private $count = 0;

    public function __invoke(Event $event): Event
    {
        $event->addExtraData(sprintf('string call N:"%s" by %s', $this->count++, self::class));
        return $event;
    }

    public function supports($event): bool
    {
        return $event instanceof Event && $event->getObject() instanceof StringType;
    }

}
