<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore\Request\Mapper\Movement;

use Core\Rover\Application\RoverSquadExplore\Request\Movement\MovementExploreRequest;
use Core\Rover\Domain\Movement\MovementFactoryData;

interface MovementFactoryDataMapper
{
    public function map(MovementExploreRequest $request): MovementFactoryData;
}
