<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore\Response\Mapper\Rover;

use Core\Rover\Application\RoverSquadExplore\Response\Rover\RoverExploreResponse;
use Core\Rover\Domain\Rover\RoverPosition;

interface RoverExploreResponseMapper
{
    public function map(RoverPosition $roverPosition): RoverExploreResponse;
}
