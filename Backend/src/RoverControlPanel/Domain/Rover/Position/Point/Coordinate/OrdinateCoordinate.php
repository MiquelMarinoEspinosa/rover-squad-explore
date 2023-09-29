<?php

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate;

final readonly class OrdinateCoordinate implements Coordinate
{
    private const MOVEMENT_STEP = 1;

    public function __construct(
        private int $value
    ) {
    }

    public function moveUp(): self
    {
        return new self(
            $this->value + self::MOVEMENT_STEP
        );
    }

    public function moveDown(): self
    {
        return new self(
            $this->value - self::MOVEMENT_STEP
        );
    }

    public function moveRight(): self
    {
        throw new NotAllowedMovement();
    }

    public function moveLeft(): self
    {
        throw new NotAllowedMovement();
    }

    public function value(): int
    {
        return $this->value;
    }
}
