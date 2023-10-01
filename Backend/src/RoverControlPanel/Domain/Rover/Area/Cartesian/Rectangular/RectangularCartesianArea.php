<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Area\Cartesian\Rectangular;

use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\CartesianArea;
use Core\RoverControlPanel\Domain\Rover\Point\Cartesian\CartesianPoint;
use Core\RoverControlPanel\Domain\Rover\Point\Cartesian\CartesianCoordinatePoint;

final readonly class RectangularCartesianArea implements CartesianArea
{
    private const LOWER_LEFT_ABSCISSA = 0;
    private const LOWER_LEFT_ORDINATE = self::LOWER_LEFT_ABSCISSA;

    private function __construct(
        private CartesianCoordinatePoint $lowerLeft,
        private CartesianCoordinatePoint $upperRight,
    ) {
        $this->validatePointArea(
            $lowerLeft,
            $upperRight
        );
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
            $this->throwRectangularCartesianAreaOutOfArea(
                $cartesianPoint
            );
        }

        if ($cartesianPoint->isLesserThan(
            $this->lowerLeft
        )) {
            $this->throwRectangularCartesianAreaOutOfArea(
                $cartesianPoint
            );
        }
    }

    public function throwRectangularCartesianAreaOutOfArea(
        CartesianPoint $cartesianPoint
    ): void {

        throw RectangularCartesianAreaOutOfArea::create(
            $this->lowerLeft,
            $this->upperRight,
            $cartesianPoint
        );
    }

    private function validatePointArea(
        CartesianCoordinatePoint $lowerLeft,
        CartesianCoordinatePoint $upperRight,
    ): void {

        if ($lowerLeft->isGreatherThan($upperRight)) {
            throw RectangularCartesianInvalidArea::create(
                $upperRight
            );
        }
    }
}
