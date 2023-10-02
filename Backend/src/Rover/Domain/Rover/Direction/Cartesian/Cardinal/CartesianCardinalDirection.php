<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal;

use Core\Rover\Domain\Rover\Direction\Direction;
use Core\Rover\Domain\Rover\Point\Cartesian\CartesianPoint;

interface CartesianCardinalDirection extends Direction
{
    public function rotateLeft(): CartesianCardinalDirection;

    public function rotateRight(): CartesianCardinalDirection;

    public function moveForward(CartesianPoint $point): CartesianPoint; 

    public function value(): string;
}
