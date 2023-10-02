<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal;

use Core\Rover\Domain\Rover\Point\Cartesian\CartesianPoint;

final readonly class NorthCardinalCartesianDirection implements CartesianCardinalDirection
{
    public function rotateLeft(): CartesianCardinalDirection {}

    public function rotateRight(): CartesianCardinalDirection {}

    public function moveForward(CartesianPoint $point): CartesianPoint {}
}