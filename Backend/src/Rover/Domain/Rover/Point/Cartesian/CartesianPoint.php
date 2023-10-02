<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Point\Cartesian;

use Core\Rover\Domain\Rover\Point\Point;

interface CartesianPoint extends Point
{
    public function moveUp(): self;

    public function moveDown(): self;

    public function moveRight(): self;

    public function moveLeft(): self;

    public function isGreatherThan(
        CartesianPoint $cartesianPoint
    ): bool;

    public function isLesserThan(
        CartesianPoint $cartesianPoint
    ): bool;
}
