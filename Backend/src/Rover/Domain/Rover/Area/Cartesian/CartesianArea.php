<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Area\Cartesian;

use Core\Rover\Domain\Rover\Area\Area;
use Core\Rover\Domain\Rover\Point\Cartesian\CartesianPoint;

interface CartesianArea extends Area
{
    public function validatePoint(CartesianPoint $point);
}
