<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore\Request\Mapper\Rover;

use Core\Rover\Application\RoverSquadExplore\Request\Rover\RoverExploreRequest;
use Core\Rover\Domain\Rover\RoverBuilderData;

interface RoverBuilderDataMapper
{
    public function map(RoverExploreRequest $response): RoverBuilderData;
}
