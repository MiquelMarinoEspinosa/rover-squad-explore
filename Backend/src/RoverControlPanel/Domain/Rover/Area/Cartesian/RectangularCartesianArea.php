<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Area\Cartesian;

use Core\RoverControlPanel\Domain\Rover\Point\Cartesian\CartesianCoordinatePoint;
use Core\RoverControlPanel\Domain\Rover\Point\Cartesian\CartesianPoint;

final readonly class RectangularCartesianArea implements CartesianArea
{
    private const LOWER_LEFT_ABSCISSA = 0;
    private const LOWER_LEFT_ORDINATE = self::LOWER_LEFT_ABSCISSA;

    private function __construct(
        private CartesianCoordinatePoint $lowerLeft,
        private CartesianCoordinatePoint $upperRight,
    ) {
    }

    public static function createWithUpperRightCoordinates(
        int $upperRightAbscissa,
        int $upperRightOrdinate
    ): self {
        return new self(
            CartesianCoordinatePoint::create(
                self::LOWER_LEFT_ABSCISSA,
                self::LOWER_LEFT_ORDINATE
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
