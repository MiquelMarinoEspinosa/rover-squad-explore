<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Area\Cartesian\Rectangular;

use Core\RoverControlPanel\Domain\Rover\Area\InvalidArea;
use Exception;

final class RectangularCartesianInvalidArea extends Exception implements InvalidArea
{
    public static function create(): self
    {
        return new self();
    }
}
