<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\AbscissaCartesianCoordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Coordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\OrdinateCartesianCoordinate;

final readonly class CartesianPoint implements Point
{
    private function __construct(
        private Coordinate $abscissa,
        private Coordinate $ordinate
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

    public function coordinate(string $name): int
    {
        if ('abscissa' === $name) {
            return $this->abscissa->value();
        }

        return $this->ordinate->value();
    }

    public function horizontal(): int
    {
        return $this->abscissa->value();
    }
}
