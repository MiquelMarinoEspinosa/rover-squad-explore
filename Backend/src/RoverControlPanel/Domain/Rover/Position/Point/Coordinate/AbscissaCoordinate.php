<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate;

final readonly class AbscissaCoordinate implements Coordinate
{
    private const MOVEMENT_VALUE = 1; 

    public function __construct(
        private int $value
    ) {
    }

    public function moveUp(): self
    {
        throw new NotAllowedMovement();
    }

    public function moveDown(): self
    {
        throw new NotAllowedMovement();
    }

    public function moveRight(): self
    {
        return new self($this->increment());
    }

    public function moveLeft(): self
    {
        return new self($this->decrement());
    }

    public function value(): int
    {
        return $this->value;
    }

    private function increment(): int
    {
        return $this->value + self::MOVEMENT_VALUE;
    }

    private function decrement(): int
    {
        return $this->value - self::MOVEMENT_VALUE;
    }
}
