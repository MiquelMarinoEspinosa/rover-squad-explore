<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Point\Cartesian;

use Core\Rover\Domain\Rover\Point\PointData;

interface CartesianPointData extends PointData
{
    public function abscissa(): int;

    public function ordinate(): int;
}
