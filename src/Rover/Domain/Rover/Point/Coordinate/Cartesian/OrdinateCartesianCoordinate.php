<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Point\Coordinate\Cartesian;

final class OrdinateCartesianCoordinate extends ParentCartesianCoordinate
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
