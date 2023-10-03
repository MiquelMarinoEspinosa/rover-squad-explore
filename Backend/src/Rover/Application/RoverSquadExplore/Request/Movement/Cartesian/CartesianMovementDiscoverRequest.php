<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore\Request\Movement\Cartesian;

use Core\Rover\Application\RoverSquadExplore\Request\Movement\MovementDiscoverRequest;

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