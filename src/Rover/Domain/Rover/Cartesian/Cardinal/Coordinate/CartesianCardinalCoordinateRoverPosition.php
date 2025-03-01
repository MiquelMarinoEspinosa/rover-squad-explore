<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate;

use Core\Rover\Domain\Rover\Cartesian\CartesianRoverPosition;

final readonly class CartesianCardinalCoordinateRoverPosition implements CartesianRoverPosition
{
    public function __construct(
        private string $cardinal,
        private int $abscissa,
        private int $ordinate
    ) {
    }

    public function cardinal(): string
    {
        return $this->cardinal;
    }

    public function abscissa(): int
    {
        return $this->abscissa;
    }

    public function ordinate(): int
    {
        return $this->ordinate;
    }
}
