<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Point\Coordinate\Cartesian;

final class AbscissaCartesianCoordinate extends ParentCartesianCoordinate
{
    public function moveRight(): self
    {
        return new self($this->increment());
    }

    public function moveLeft(): self
    {
        return new self($this->decrement());
    }
}
