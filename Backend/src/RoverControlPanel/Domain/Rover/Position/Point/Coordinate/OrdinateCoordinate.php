<?php

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate;

final readonly class OrdinateCoordinate implements Coordinate
{
    public function moveUp(): self
    {
    }

    public function moveDown(): self
    {
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
    }
}
