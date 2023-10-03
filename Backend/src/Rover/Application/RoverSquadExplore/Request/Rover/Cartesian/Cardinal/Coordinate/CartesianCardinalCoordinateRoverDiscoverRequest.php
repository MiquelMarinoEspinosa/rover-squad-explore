<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore\Request\Rover\Cartesian\Cardinal\Coordinate;

use Core\Rover\Application\RoverSquadExplore\Request\Rover\RoverDiscoverRequest;

final readonly class CartesianCardinalCoordinateRoverDiscoverRequest implements RoverDiscoverRequest
{
    public function __construct(
        private int $areaUpperRightAbscissa,
        private int $areaUpperRightOrdinate,
        private string $positionCardinal,
        private int $positionAbscissa,
        private int $positionOrdinate
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

    public function positionCardinal(): string
    {
        return $this->positionCardinal;
    }

    public function positionAbscissa(): int
    {
        return $this->positionAbscissa;
    }

    public function positionOrdinate(): int
    {
        return $this->positionOrdinate;
    }     
}
