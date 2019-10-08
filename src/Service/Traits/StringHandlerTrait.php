<?php
declare(strict_types=1);


namespace App\Service\Traits;


use App\Service\StringType;

trait StringHandlerTrait
{
    public function __invoke($value)
    {
        if ($value instanceof StringType) {
            return sprintf($this->getFormat() . $this->getMessage(), $value->get());
        }
        throw new \Exception('Wrong value type');
    }


    public function supports($value, array $context = []): bool
    {
        return $value instanceof StringType;
    }
}
