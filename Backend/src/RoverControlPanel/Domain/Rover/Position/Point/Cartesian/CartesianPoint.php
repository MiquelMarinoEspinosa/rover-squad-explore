<?php

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Point;

interface CartesianPoint extends Point
{
    public function moveUp(): self;
}