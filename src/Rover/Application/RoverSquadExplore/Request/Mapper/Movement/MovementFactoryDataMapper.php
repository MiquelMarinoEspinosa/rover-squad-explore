<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore\Request\Mapper\Movement;

use Core\Rover\Domain\Movement\MovementFactoryData;
use Core\Rover\Application\RoverSquadExplore\Request\Movement\MovementExploreRequest;

interface MovementFactoryDataMapper
{
    public function map(MovementExploreRequest $request): MovementFactoryData;
}
