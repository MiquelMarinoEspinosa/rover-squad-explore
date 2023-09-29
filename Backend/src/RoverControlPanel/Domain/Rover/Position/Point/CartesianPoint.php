<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\AbscissaCartesianCoordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Coordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\OrdinateCartesianCoordinate;

final readonly class CartesianPoint implements Point
{
    private array $coordinates;

    private function __construct(
        private Coordinate $abscissa,
        private Coordinate $ordinate
    ) {
        $this->coordinates = [
            'abscissa' => $this->abscissa,
            'ordinate' => $this->ordinate
        ];
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

    public function coordinateNames(): array
    {
        return [
            'abscissa',
            'ordinate'
        ];
    }

    public function coordinateValue(string $coordinateName): int
    {
        return $this->coordinates[$coordinateName]->value();
    }
}
