<?php
declare(strict_types=1);


namespace App\Service\Events;


interface ListenerInterface
{
    public function __invoke(Event $event): Event;

    public function supports($event):bool;
}
