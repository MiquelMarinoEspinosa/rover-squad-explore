<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Point\Cartesian;

final readonly class CartesianCoordinatePointData implements CartesianPointData
{
    public function __construct(
        private int $abscissa,
        private int $ordinate
    ) {
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
