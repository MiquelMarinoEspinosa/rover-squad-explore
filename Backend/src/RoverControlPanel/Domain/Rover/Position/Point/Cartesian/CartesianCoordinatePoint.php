<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Cartesian\CartesianCoordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Cartesian\AbscissaCartesianCoordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Cartesian\OrdinateCartesianCoordinate;

final readonly class CartesianCoordinatePoint implements CartesianPoint
{
    private function __construct(
        private CartesianCoordinate $abscissa,
        private CartesianCoordinate $ordinate
    ) {
    }

    public static function create(
        int $absissa,
        int $ordinate
    ): self {

        return new self(
            new AbscissaCartesianCoordinate($absissa),
            new OrdinateCartesianCoordinate($ordinate)
        );
    }

    public function moveUp(): self
    {
        return new self(
            $this->abscissa,
            $this->ordinate->moveUp()
        );
    }

    public function moveDown(): self
    {
        return new self(
            $this->abscissa,
            $this->ordinate->moveDown()
        );
    }

    public function moveRight(): self
    {
        return new self(
            $this->abscissa->moveRight(),
            $this->ordinate
        );
    }

    public function moveLeft(): self
    {
        return new self(
            $this->abscissa->moveLeft(),
            $this->ordinate
        );
    }

    public function isGreatherThan(
        CartesianPoint $cartesianPoint
    ): bool {
        if ($this->isAbscissaCoordinateGreatherThan(
            $cartesianPoint
        )) {
            return true;
        }

        return $this->isOrdinateCoordinateGreatherThan(
            $cartesianPoint
        );
    }

    public function isLesserThan(
        CartesianPoint $cartesianPoint
    ): bool {

        return false;
    }

    public function data(): CartesianCoordinatePointData
    {
        return new CartesianCoordinatePointData(
            $this->abscissa->value(),
            $this->ordinate->value()
        );
    }

    private function isAbscissaCoordinateGreatherThan(
        CartesianPoint $cartesianPoint
    ): bool {
        $abscissaValue = $cartesianPoint->data()->abscissa();

        return $this->abscissa->greaterThan(
            new AbscissaCartesianCoordinate($abscissaValue)
        );
    }

    private function isOrdinateCoordinateGreatherThan(
        CartesianPoint $cartesianPoint
    ): bool {
        $ordinateValue = $cartesianPoint->data()->ordinate();

        return $this->ordinate->greaterThan(
            new OrdinateCartesianCoordinate($ordinateValue)
        );
    }
}
