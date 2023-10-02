<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal;

use Core\Rover\Domain\Rover\Direction\Direction;

interface CartesianCardinalDirection extends Direction
{
    public function rotateLeft(): CartesianCardinalDirection;

    public function rotateRight(): CartesianCardinalDirection;
}
