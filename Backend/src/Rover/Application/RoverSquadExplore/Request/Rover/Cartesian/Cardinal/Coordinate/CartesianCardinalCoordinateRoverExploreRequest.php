<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore\Request\Rover\Cartesian\Cardinal\Coordinate;

use Core\Rover\Application\RoverSquadExplore\Request\Rover\RoverExploreRequest;

final readonly class CartesianCardinalCoordinateRoverExploreRequest implements RoverExploreRequest
{
    public function __construct(
        private int $areaUpperRightAbscissa,
        private int $areaUpperRightOrdinate,
        private int $positionAbscissa,
        private int $positionOrdinate,
        private string $positionCardinal
    ) {
    }

    public function areaUpperRightAbscissa(): int
    {
        return $this->areaUpperRightAbscissa;
    }

    public function areaUpperRightOrdinate(): int
    {
        return $this->areaUpperRightOrdinate;
    }

    public function positionAbscissa(): int
    {
        return $this->positionAbscissa;
    }

    public function positionOrdinate(): int
    {
        return $this->positionOrdinate;
    }
    
    public function positionCardinal(): string
    {
        return $this->positionCardinal;
    }
}
