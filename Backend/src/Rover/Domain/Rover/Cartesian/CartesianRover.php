<?php

namespace Core\Rover\Domain\Rover\Cartesian;

use Core\Rover\Domain\Rover\Rover;

interface CartesianRover extends Rover
{
    public function rotateLeft(): self;
}
