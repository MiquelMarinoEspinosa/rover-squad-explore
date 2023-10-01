<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Cartesian;

final class CartesianCoordinateNotAllowedMovement extends \Exception
{
    public static function create(
        string $movement
    ): self {
        return new self();
    }
}
