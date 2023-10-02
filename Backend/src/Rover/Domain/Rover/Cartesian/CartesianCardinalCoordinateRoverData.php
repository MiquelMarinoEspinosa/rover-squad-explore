<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Cartesian;

final readonly class CartesianCardinalCoordinateRoverData implements CartesianRoverData
{
    public function __construct(
        private string $cardinalDirection
    ) {

    }
    
    public function cardinalDirection(): string
    {
        return $this->cardinalDirection;
    }
}
