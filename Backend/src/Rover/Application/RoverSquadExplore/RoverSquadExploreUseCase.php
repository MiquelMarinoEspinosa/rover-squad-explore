<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore;

use Core\Rover\Application\RoverSquadExplore\Response\RoverSquadExploreResponse;
use Core\Rover\Application\UseCase;
use Core\Rover\Application\UseCaseRequest;

final class RoverSquadExploreUseCase implements UseCase
{
    public function execute(UseCaseRequest $request): RoverSquadExploreResponse
    {
        return new RoverSquadExploreResponse;
    }
}
