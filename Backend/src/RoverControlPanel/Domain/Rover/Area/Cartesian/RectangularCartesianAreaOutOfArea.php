<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Area\Cartesian;

use Core\RoverControlPanel\Domain\Rover\Area\OutOfArea;

final class RectangularCartesianAreaOutOfArea extends \Exception implements OutOfArea
{
    public static function create(): self
    {
        return new self();
    }
}
