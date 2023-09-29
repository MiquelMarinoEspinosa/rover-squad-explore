<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\AbscissaCartesianCoordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Coordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\OrdinateCartesianCoordinate;

final readonly class CartesianPoint implements Point
{
    private const ABSCISSA = 'abscissa';
    private const ORDINATE = 'ordinate';

    private const COORDINATE_NAMES =  [
        self::ABSCISSA,
        self::ORDINATE
    ];

    private array $coordinates;

    private function __construct(
        private Coordinate $abscissa,
        private Coordinate $ordinate
    ) {
        $this->coordinates = [
            self::ABSCISSA => $this->abscissa,
            self::ORDINATE => $this->ordinate
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
        return self::COORDINATE_NAMES;
    }

    public function coordinateValue(string $coordinateName): int
    {
        if (!isset($this->coordinates[$coordinateName])) {
            throw new CoordinatePointNotFound(
                'Coordinate point not found: ' . $coordinateName
            );
        }

        return $this->coordinates[$coordinateName]->value();
    }
}
