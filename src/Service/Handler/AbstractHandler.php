<?php

declare(strict_types=1);

namespace App\Service\Handler;


abstract class AbstractHandler
{
    private $message;

    /**
     * @var string
     */
    private $format;

    public function __construct(string $format)
    {
        $this->format = $format;
    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @param string $format
     */
    public function setFormat(string $format): void
    {
        $this->format = $format;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

}
