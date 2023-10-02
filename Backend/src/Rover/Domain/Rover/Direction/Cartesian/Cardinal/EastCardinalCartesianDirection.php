<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal;

use Core\Rover\Domain\Rover\Point\Cartesian\CartesianPoint;

final readonly class EastCardinalCartesianDirection implements CartesianCardinalDirection
{
    public function rotateLeft(): CartesianCardinalDirection
    {
        return new NorthCardinalCartesianDirection;
    }

    public function rotateRight(): CartesianCardinalDirection
    {
        return new SouthCardinalCartesianDirection;
    }

    public function moveForward(CartesianPoint $point): CartesianPoint
    {
        return $point->moveRight();
    }

    public function value(): string
    {
        return 'E';
    }
}
