<?php

declare(strict_types=1);

namespace Core\Rover\Application\Explore\Response\Mapper\Rover;

use Core\Rover\Application\Explore\Response\Rover\RoverDiscoverResponse;

interface RoverDiscoverResponseMapper
{
    public function map(): RoverDiscoverResponse;
}
