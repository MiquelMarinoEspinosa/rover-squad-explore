<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Movement;

use Core\Rover\Domain\Rover\Rover;

interface Movement
{
    public function apply(Rover $rover): Rover;
}
