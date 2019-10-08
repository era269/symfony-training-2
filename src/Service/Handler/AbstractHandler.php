<?php

declare(strict_types=1);

namespace App\Service\Handler;


use App\Service\NumberType;
use App\Service\StringType;

abstract class AbstractHandler
{
    private $message;

    private $format;

    public function __construct(string $format)
    {
        $this->format = $format;
    }

    public function getFormat(): string
    {
        return $this->format;
    }

    public function setFormat(string $format): void
    {
        $this->format = $format;
    }

    public function getMessage():string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

}
