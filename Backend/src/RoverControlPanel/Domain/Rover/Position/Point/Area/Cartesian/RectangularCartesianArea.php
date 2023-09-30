<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Area\Cartesian;

final readonly class RectangularCartesianArea implements CartesianArea
{
    private function __construct(
        private int $lowerLeftAbscissa,
        private int $lowerLeftOrdinate,
        private int $upperRightAbscissa,
        private int $upperRightOrdinate
    ) {
    }

    public static function create(
        int $lowerLeftAbscissa,
        int $lowerLeftOrdinate,
        int $upperRightAbscissa,
        int $upperRightOrdinate
    ): self {
        return new self(
            $lowerLeftAbscissa,
            $lowerLeftOrdinate,
            $upperRightAbscissa,
            $upperRightOrdinate
        );
    }

    public function checkPoint(int $abscissa, int $ordenada): void
    {
        if ($abscissa < $this->lowerLeftAbscissa) {
            throw new \Exception();
        }
    }
}
