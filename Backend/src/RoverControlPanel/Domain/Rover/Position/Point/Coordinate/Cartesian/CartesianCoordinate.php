<?php

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Cartesian;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Coordinate;

interface CartesianCoordinate extends Coordinate
{
    public function moveUp(): self;

    public function moveDown(): self;

    public function moveRight(): self;

    public function moveLeft(): self;
}