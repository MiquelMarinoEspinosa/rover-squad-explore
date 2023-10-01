<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian;

final readonly class CartesianCoordinatePointData implements CartesianPointData
{
    public function __construct(
        private int $abscissa
    ) {
    }

    public function abscissa(): int
    {
        return $this->abscissa;
    }
}
