<?php
declare(strict_types=1);


namespace App\Service\Traits;


use App\Service\NumberType;

trait NumberHandlerTrait
{
    /**
     * @inheritDoc
     */
    public function __invoke($value)
    {
        if ($value instanceof NumberType) {
            return sprintf($this->getFormat() . $this->getMessage(), $value->get());
        }
        throw new \Exception('Wrong value type');
    }

    /**
     * @inheritDoc
     */
    public function supports($value, array $context = []): bool
    {
        return $value instanceof NumberType;
    }

}
