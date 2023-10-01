<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Point\Area\Cartesian;

use Core\RoverControlPanel\Domain\Rover\Point\Area\Area;
use Core\RoverControlPanel\Domain\Rover\Point\Cartesian\CartesianPoint;

interface CartesianArea extends Area
{
    public function checkPoint(CartesianPoint $point);
}