<?php

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Area\Cartesian;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Area\Area;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian\CartesianPoint;

interface CartesianArea extends Area
{
    public function checkPoint(CartesianPoint $point);
}