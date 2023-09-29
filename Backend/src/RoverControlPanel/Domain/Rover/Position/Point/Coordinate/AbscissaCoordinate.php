<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate;

final class AbscissaCoordinate extends CartesianCoordinate
{
    private const MOVEMENT_STEP = 1;

    public function moveRight(): self
    {
        return new self($this->increment());
    }

    public function moveLeft(): self
    {
        return new self($this->decrement());
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
