<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian;

use Core\RoverControlPanel\Domain\Rover\Position\Point\PointData;

interface CartesianPointData extends PointData
{
    public function abscissa(): int;
}
