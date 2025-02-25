<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Movement\Cartesian;

final readonly class CartesianMovementFactoryData implements CartesianMovementAbstractFactoryData
{
    public function __construct(
        private string $movementValue
    ) {
    }

    public function movementValue(): string
    {
        return $this->movementValue;
    }
}
