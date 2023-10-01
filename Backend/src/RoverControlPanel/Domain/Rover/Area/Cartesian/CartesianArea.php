<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Area\Cartesian;

use Core\RoverControlPanel\Domain\Rover\Area\Area;
use Core\RoverControlPanel\Domain\Rover\Point\Cartesian\CartesianPoint;

interface CartesianArea extends Area
{
    public function validatePoint(CartesianPoint $point);
}