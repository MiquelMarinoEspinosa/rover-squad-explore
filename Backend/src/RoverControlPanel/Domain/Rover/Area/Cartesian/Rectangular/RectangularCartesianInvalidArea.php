<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Area\Cartesian\Rectangular;

use Core\RoverControlPanel\Domain\Rover\Area\InvalidArea;
use Core\RoverControlPanel\Domain\Rover\Point\Cartesian\CartesianPoint;
use Exception;

final class RectangularCartesianInvalidArea extends Exception implements InvalidArea
{
    public static function create(
        CartesianPoint $invalidPoint
    ): self {
        return new self();
    }
}
