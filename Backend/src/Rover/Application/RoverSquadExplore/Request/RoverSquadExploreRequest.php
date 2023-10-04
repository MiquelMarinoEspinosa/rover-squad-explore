<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore\Request;

use Core\Rover\Application\UseCaseRequest;

final readonly class RoverSquadExploreRequest implements UseCaseRequest
{
    public function __construct(
        private array $roverExploreRequests,
        private array $movementExploreCollectionRequests
    ) {
    }

    public function roverExploreRequests(): array
    {
        return $this->roverExploreRequests;
    }


    public function movementExploreCollectionRequests(): array
    {
        return $this->movementExploreCollectionRequests;
    }
}
