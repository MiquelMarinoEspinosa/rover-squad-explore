<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Area\Cartesian;

use Core\RoverControlPanel\Domain\Rover\Point\Cartesian\CartesianCoordinatePoint;
use Core\RoverControlPanel\Domain\Rover\Point\Cartesian\CartesianPoint;

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

    public function checkPoint(CartesianPoint $cartesianPoint): void
    {
        if ($cartesianPoint->isGreatherThan(
            $this->upperRight
        )) {
            throw new \Exception();
        }
    }
}
