<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Cartesian;

use Core\Rover\Domain\Rover\RoverBuilderData;

interface CartesianRoverBuilderData extends RoverBuilderData
{
    public function areaUpperRightAbscissa(): int;

    public function areaUpperRightOrdinate(): int;

    public function positionCardinal(): string;

    public function positionAbscissa(): int;

    public function positionCordinate(): int;
}
