<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Cartesian;

use Core\Rover\Domain\Rover\Rover;
use Core\Rover\Domain\Rover\Area\Cartesian\CartesianArea;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirection;

final readonly class CartesianRover implements Rover
{
    public static function create(
        CartesianArea $cartesianArea,
        CartesianCardinalDirection $cartesianCardinalDirection,
        int $pointAbscissa,
        int $pointOrdinate
    ): self {
        return new self;
    }
}