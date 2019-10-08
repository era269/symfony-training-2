<?php
declare(strict_types=1);


namespace App\Service\Events;


use App\Service\TypeObject;
use Psr\EventDispatcher\StoppableEventInterface;

class Event implements StoppableEventInterface
{
    private $object;

    private $extraData;

    public function __construct(TypeObject $object)
    {
        $this->object = $object;
    }

    private $propagationStopped = false;

    public function isPropagationStopped(): bool
    {
        return $this->propagationStopped;
    }

    public function stopPropagation(): void
    {
        $this->propagationStopped = true;
    }

    /**
     * @return mixed
     */
    public function getExtraData()
    {
        return $this->extraData;
    }

    /**
     * @param mixed $extraData
     */
    public function addExtraData($extraData): void
    {
        $this->extraData[] = $extraData;
    }

    /**
     * @return TypeObject
     */
    public function getObject(): TypeObject
    {
        return $this->object;
    }

}
