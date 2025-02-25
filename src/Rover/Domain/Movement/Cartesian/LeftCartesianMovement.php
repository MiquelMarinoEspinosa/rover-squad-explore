<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Movement\Cartesian;

use Core\Rover\Domain\Rover\Rover;
use Core\Rover\Domain\Rover\Cartesian\CartesianRover;

final readonly class LeftCartesianMovement implements CartesianMovement
{
    public function apply(Rover $rover): CartesianRover
    {
        return $rover->rotateLeft();
    }
}
