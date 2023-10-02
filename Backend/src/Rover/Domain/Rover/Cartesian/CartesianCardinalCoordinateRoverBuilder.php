<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Cartesian;

final readonly class CartesianCardinalCoordinateRoverBuilder implements CartesianRoverBuilder
{
    public static function getInstance(): self
    {
        return new self;
    }
}