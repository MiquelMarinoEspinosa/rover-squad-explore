<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Area;

final readonly class RectangularArea implements Area
{
    public static function create(
        int $lowerLeftAbscissa,
        int $lowerLeftOrdinate,
        int $upperRightAbscissa,
        int $upperRightOrdinate
    ): self {
        return new self();
    }
}
