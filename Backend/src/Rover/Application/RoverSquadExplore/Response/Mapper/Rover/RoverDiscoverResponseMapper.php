<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore\Response\Mapper\Rover;

use Core\Rover\Application\RoverSquadExplore\Response\Rover\RoverDiscoverResponse;

interface RoverDiscoverResponseMapper
{
    public function map(): RoverDiscoverResponse;
}
