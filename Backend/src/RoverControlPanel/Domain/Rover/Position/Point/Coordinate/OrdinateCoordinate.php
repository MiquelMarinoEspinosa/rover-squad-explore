<?php

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate;

final class OrdinateCoordinate extends CartesianCoordinate
{
    private const MOVEMENT_STEP = 1;

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

    private function increment(): int
    {
        return $this->value + self::MOVEMENT_STEP;
    }

    private function decrement(): int
    {
        return $this->value - self::MOVEMENT_STEP;
    }
}
