<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Movement\Cartesian;

use Core\Rover\Domain\Rover\Cartesian\CartesianRover;
use Core\Rover\Domain\Rover\Rover;

final readonly class RightCartesianMovement implements CartesianMovement
{
    public function apply(Rover $rover): CartesianRover
    {
        return $rover->rotateRight();
    }
}
