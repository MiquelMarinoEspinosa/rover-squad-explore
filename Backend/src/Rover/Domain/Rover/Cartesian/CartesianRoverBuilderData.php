<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Cartesian;

interface CartesianRoverBuilderData
{
    public function areaUpperRightAbscissa(): int;
    public function areaUpperRightOrdinate(): int;
    public function positionCardinal(): string;
    public function positionAbscissa(): int;
    public function positionCordinate(): int;
}