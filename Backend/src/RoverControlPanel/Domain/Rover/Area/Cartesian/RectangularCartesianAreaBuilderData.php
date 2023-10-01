<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Area\Cartesian;

final readonly class RectangularCartesianAreaBuilderData implements CartesianAreaBuilderData
{
    public function __construct(
        private int $upperRightAbscissa,
        private int $upperRightOrdinate
    ) {
    }

    public function upperRightAbscissa(): int
    {
        return $this->upperRightAbscissa;
    }

    public function upperRightOrdinate(): int
    {
        return $this->upperRightOrdinate;
    }
}
