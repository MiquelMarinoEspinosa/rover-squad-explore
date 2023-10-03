<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore\Request;

use Core\Rover\Application\RoverSquadExplore\Request\Movement\MovementExploreRequest;
use Core\Rover\Application\UseCaseRequest;

final readonly class RoverSquadExploreRequest implements UseCaseRequest
{
    public function __construct(
        private array $movementExploreRequests,
        private array $roverExploreRequests
    ) {
    }

    public function movementExploreRequests(): array
    {
        return $this->movementExploreRequests;
    }

    public function roverExploreRequests(): array
    {
        return $this->roverExploreRequests;
    }
}
