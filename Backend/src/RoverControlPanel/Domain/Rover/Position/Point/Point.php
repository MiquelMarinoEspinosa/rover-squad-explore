<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point;

interface Point
{
    public function data(): PointData;

    public function coordinateNames(): array;

    public function coordinateValue(string $coordinateName): int;
}
