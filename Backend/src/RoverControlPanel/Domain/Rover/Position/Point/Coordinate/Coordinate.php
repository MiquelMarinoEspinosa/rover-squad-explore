<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate;

interface Coordinate
{
    public function moveUp(): self;
}
