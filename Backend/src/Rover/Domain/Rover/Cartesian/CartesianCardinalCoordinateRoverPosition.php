<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Cartesian;

final readonly class CartesianCardinalCoordinateRoverPosition implements CartesianRoverPosition
{
    public function __construct(
        private string $cardinal
    ) {
    }

    public function cardinal(): string
    {
        return $this->cardinal;
    }
}
