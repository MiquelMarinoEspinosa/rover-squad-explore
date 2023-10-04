<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Cartesian;

use Core\Rover\Domain\Rover\RoverPosition;

interface CartesianRoverPosition extends RoverPosition
{
    public function cardinal(): string;

    public function abscissa(): int;

    public function ordinate(): int;
}
