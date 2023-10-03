<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Movement\Cartesian;

final readonly class CartesianMovementFactoryData implements CartesianMovementAbstractFactoryData
{
    public function movementValue(): string 
    {
        return 'L';
    }
}