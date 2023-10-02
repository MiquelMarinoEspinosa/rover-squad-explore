<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Cartesian;

use Core\Rover\Domain\Rover\Area\Cartesian\CartesianArea;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirection;
use Core\Rover\Domain\Rover\Point\Cartesian\CartesianCoordinatePoint;
use Core\Rover\Domain\Rover\Point\Cartesian\CartesianPoint;

final class CartesianCardinalCoordinateRover implements CartesianRover
{
    public function __construct(
        private CartesianArea $cartesianArea,
        private CartesianCardinalDirection $cartesianCardinalDirection,
        private CartesianPoint $cartesianPoint
    ) {
    }

    public static function create(
        CartesianArea $cartesianArea,
        CartesianCardinalDirection $cartesianCardinalDirection,
        int $cartesianPointAbscissa,
        int $cartesianPointOrdinate
    ): self {

        return new self(
            $cartesianArea,
            $cartesianCardinalDirection,
            CartesianCoordinatePoint::create(
                $cartesianPointAbscissa,
                $cartesianPointOrdinate
            )
        );
    }

    public function position(): CartesianCardinalCoordinateRoverPosition
    {
        $cartesianPointData = $this->cartesianPoint->data();

        return new CartesianCardinalCoordinateRoverPosition(
            $this->cartesianCardinalDirection->value(),
            $cartesianPointData->abscissa(),
            $cartesianPointData->ordinate()
        );
    }

    public function rotateLeft(): self
    {
        $this->cartesianCardinalDirection = $this->cartesianCardinalDirection
            ->rotateLeft();

        return $this;
    }

    public function rotateRight(): self
    {
        $this->cartesianCardinalDirection = $this->cartesianCardinalDirection
            ->rotateRight();

        return $this;
    }
}
