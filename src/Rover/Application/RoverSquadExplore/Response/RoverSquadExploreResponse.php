<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore\Response;

use Core\Rover\Application\UseCaseResponse;

final readonly class RoverSquadExploreResponse implements UseCaseResponse
{
    public function __construct(
        private array $roverExploreResponses
    ) {
    }

    public function roverExploreResponses(): array
    {
        return $this->roverExploreResponses;
    }
}
