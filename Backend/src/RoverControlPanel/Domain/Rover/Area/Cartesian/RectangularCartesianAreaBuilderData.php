<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Area\Cartesian;

final readonly class RectangularCartesianAreaBuilderData implements CartesianAreaBuilderData
{
    public function upperRightAbscissa(): int
    {
        return 0;
    }
}
