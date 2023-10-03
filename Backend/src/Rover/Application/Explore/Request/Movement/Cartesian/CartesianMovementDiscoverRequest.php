<?php

declare(strict_types=1);

namespace Core\Rover\Application\Explore\Request\Movement\Cartesian;

use Core\Rover\Application\Explore\Request\Movement\MovementDiscoverRequest;

final class CartesianMovementDiscoverRequest implements MovementDiscoverRequest
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