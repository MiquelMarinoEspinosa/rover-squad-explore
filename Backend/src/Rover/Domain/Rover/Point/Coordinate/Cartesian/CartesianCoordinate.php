<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Point\Coordinate\Cartesian;

use Core\Rover\Domain\Rover\Point\Coordinate\Coordinate;

interface CartesianCoordinate extends Coordinate
{
    public function moveUp(): self;

    public function moveDown(): self;

    public function moveRight(): self;

    public function moveLeft(): self;

    public function isGreaterThan(
        CartesianCoordinate $cartesianCoordinate
    ): bool;

    public function isLesserThan(
        CartesianCoordinate $cartesianCoordinate
    ): bool;
}
