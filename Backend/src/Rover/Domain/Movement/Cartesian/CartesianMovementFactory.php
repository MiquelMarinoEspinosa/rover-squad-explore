<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Movement\Cartesian;

final readonly class CartesianMovementFactory implements CartesianMovementAbstractFactory
{
    public static function getInstance(): self
    {
        return new self;
    }
}
