<?php

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate;

final class OrdinateCoordinate extends CartesianCoordinate
{
    public function moveUp(): self
    {
        return new self(
            $this->increment()
        );
    }

    public function moveDown(): self
    {
        return new self(
            $this->decrement()
        );
    }
}
