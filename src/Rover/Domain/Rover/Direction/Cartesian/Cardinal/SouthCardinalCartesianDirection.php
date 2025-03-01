<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal;

use Core\Rover\Domain\Rover\Point\Cartesian\CartesianPoint;

final readonly class SouthCardinalCartesianDirection implements CartesianCardinalDirection
{
    private const VALUE = 'S';

    public function rotateLeft(): CartesianCardinalDirection
    {
        return new EastCardinalCartesianDirection;
    }

    public function rotateRight(): CartesianCardinalDirection
    {
        return new WestCardinalCartesianDirection;
    }

    public function moveForward(CartesianPoint $point): CartesianPoint
    {
        return $point->moveDown();
    }

    public function value(): string
    {
        return self::VALUE;
    }
}
