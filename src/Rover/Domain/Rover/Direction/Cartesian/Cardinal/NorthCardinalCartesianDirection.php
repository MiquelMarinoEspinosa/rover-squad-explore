<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal;

use Core\Rover\Domain\Rover\Point\Cartesian\CartesianPoint;

final readonly class NorthCardinalCartesianDirection implements CartesianCardinalDirection
{
    private const VALUE = 'N';

    public function rotateLeft(): CartesianCardinalDirection
    {
        return new WestCardinalCartesianDirection;
    }

    public function rotateRight(): CartesianCardinalDirection
    {
        return new EastCardinalCartesianDirection;
    }

    public function moveForward(CartesianPoint $point): CartesianPoint
    {
        return $point->moveUp();
    }

    public function value(): string
    {
        return self::VALUE;
    }
}
