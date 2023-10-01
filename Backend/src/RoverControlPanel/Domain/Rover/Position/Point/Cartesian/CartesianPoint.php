<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Point;

interface CartesianPoint extends Point
{
    public function moveUp(): self;

    public function moveDown(): self;

    public function moveRight(): self;

    public function moveLeft(): self;

    public function isGreatherThan(
        CartesianPoint $cartesianPoint
    ): bool;
}
