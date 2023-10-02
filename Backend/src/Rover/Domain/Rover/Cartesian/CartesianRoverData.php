<?php

namespace Core\Rover\Domain\Rover\Cartesian;

use Core\Rover\Domain\Rover\RoverData;

interface CartesianRoverData extends RoverData
{
    public function cardinal(): string;
}
