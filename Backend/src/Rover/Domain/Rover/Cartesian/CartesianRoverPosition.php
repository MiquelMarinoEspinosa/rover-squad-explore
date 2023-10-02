<?php

namespace Core\Rover\Domain\Rover\Cartesian;

use Core\Rover\Domain\Rover\RoverPosition;

interface CartesianRoverPosition extends RoverPosition
{
    public function cardinal(): string;
}
