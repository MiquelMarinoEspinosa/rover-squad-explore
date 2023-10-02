<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal;

use Core\Rover\Domain\Rover\Point\Cartesian\CartesianPoint;

final readonly class WestCardinalCartesianDirection implements CartesianCardinalDirection
{
    public function rotateLeft(): CartesianCardinalDirection
    {
        return new SouthCardinalCartesianDirection;
    }

    public function rotateRight(): CartesianCardinalDirection
    {
        return new NorthCardinalCartesianDirection;
    }

    public function moveForward(CartesianPoint $point): CartesianPoint
    {
    }
}
