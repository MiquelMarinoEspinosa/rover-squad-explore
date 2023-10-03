<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore\Request\Movement\Cartesian;

use Core\Rover\Application\RoverSquadExplore\Request\Movement\MovementExploreRequest;

final class CartesianMovementExploreRequest implements MovementExploreRequest
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