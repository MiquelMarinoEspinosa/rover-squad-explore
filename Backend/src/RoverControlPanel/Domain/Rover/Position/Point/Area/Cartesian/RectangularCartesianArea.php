<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Area\Cartesian;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian\CartesianCoordinatePoint;

final readonly class RectangularCartesianArea implements CartesianArea
{
    private function __construct(
        private CartesianCoordinatePoint $lowerLeft,
        private CartesianCoordinatePoint $upperRight,
    ) {
    }

    public static function create(
        int $lowerLeftAbscissa,
        int $lowerLeftOrdinate,
        int $upperRightAbscissa,
        int $upperRightOrdinate
    ): self {
        return new self(
            CartesianCoordinatePoint::create(
                $lowerLeftAbscissa,
                $lowerLeftOrdinate
            ),
            CartesianCoordinatePoint::create(
                $upperRightAbscissa, 
                $upperRightOrdinate
            )
        );
    }

    public function checkPoint(int $abscissa, int $ordenada): void
    {
        if ($abscissa < $this->lowerLeft->coordinateValue('abscissa')) {
            throw new \Exception();
        }
    }
}
