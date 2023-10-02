<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Cartesian;

final readonly class CartesianCardinalCoordinateRoverBuilderData implements CartesianRoverBuilderData
{
    public function __construct(
        private int $areaUpperRightAbscissa,
        private int $areaUpperRightOrdinate,
        private string $positionCardinal,
        private int $positionAbscissa,
        private int $positionCordinate
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

    public function positionCordinate(): int
    {
        return $this->positionCordinate;
    }
}
