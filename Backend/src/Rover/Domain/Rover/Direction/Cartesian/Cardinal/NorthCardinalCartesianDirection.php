<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal;

final readonly class NorthCardinalCartesianDirection implements CartesianCardinalDirection
{
    public function rotateLeft(): CartesianCardinalDirection {}

    public function rotateRight(): CartesianCardinalDirection {}
}