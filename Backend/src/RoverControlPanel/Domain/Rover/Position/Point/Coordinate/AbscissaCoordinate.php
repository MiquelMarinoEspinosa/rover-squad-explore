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
        return new self(
            $this->value + self::MOVEMENT_VALUE
        );
    }

    public function moveLeft(): self
    {
        return new self(
            $this->value - self::MOVEMENT_VALUE
        );
    }

    public function value(): int
    {
        return $this->value;
    }
}
