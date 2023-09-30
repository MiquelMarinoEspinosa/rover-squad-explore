<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Cartesian\CartesianCoordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Cartesian\AbscissaCartesianCoordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Cartesian\OrdinateCartesianCoordinate;

final readonly class CartesianCoordinatePoint implements CartesianPoint
{
    private const ABSCISSA         = 'abscissa';
    private const ORDINATE         = 'ordinate';
    private const COORDINATE_NAMES =  [
        self::ABSCISSA,
        self::ORDINATE
    ];
    private const ERROR_MESSAGE = 'Coordinate point not found: ';

    private array $coordinates;

    private function __construct(
        private CartesianCoordinate $abscissa,
        private CartesianCoordinate $ordinate
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

    public function greatherThan(
        CartesianPoint $cartesianPoint
    ): bool {
        return false;
    }

    public function coordinateNames(): array
    {
        return self::COORDINATE_NAMES;
    }

    public function coordinateValue(string $coordinateName): int
    {
        if (!$this->coordinateExists($coordinateName)) {
            throw new CartesianCoordinateNotFound(
                self::ERROR_MESSAGE . $coordinateName
            );
        }

        return $this->coordinates[$coordinateName]->value();
    }

    private function coordinateExists($coordinateName): bool
    {
        return isset($this->coordinates[$coordinateName]);
    }
}
