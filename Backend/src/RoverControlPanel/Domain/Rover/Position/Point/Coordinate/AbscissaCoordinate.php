<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate;

final readonly class AbscissaCoordinate implements Coordinate
{
    public function moveUp(): self
    {
        throw new NotAllowedMovement();
    }

    public function moveDown(): self
    {
        throw new NotAllowedMovement();
    }
}
