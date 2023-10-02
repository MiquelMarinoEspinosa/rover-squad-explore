<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Movement\Cartesian;

use Core\Rover\Domain\Movement\Movement;
use Core\Rover\Domain\Rover\Cartesian\CartesianRover;

interface CartesianMovement extends Movement
{
    public function apply(CartesianRover $cartesianRover): CartesianRover;
}
