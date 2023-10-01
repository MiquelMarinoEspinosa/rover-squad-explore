<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Area\Cartesian;

final readonly class RectangularCartesianAreaBuilder implements CartesianAreaBuilder
{
    public static function getInstance(): self
    {
        return new self();
    }
}
