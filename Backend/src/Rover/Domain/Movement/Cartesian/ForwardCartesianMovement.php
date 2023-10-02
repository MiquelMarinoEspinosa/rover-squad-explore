<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Movement\Cartesian;

use Core\Rover\Domain\Rover\Cartesian\CartesianRover;

final readonly class ForwardCartesianMovement implements CartesianMovement
{
    public function apply(
        CartesianRover $cartesianRover
    ): CartesianRover {

        return $cartesianRover->moveForward();
    }
}
