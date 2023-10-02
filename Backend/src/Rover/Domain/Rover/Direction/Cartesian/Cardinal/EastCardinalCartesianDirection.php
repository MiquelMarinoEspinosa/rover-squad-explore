<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal;

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
}
