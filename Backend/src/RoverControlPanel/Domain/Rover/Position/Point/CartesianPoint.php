<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point;

final readonly class CartesianPoint implements Point
{
    public static function create(
        int $absissa,
        int $ordinate
    ): self {

        return new self(
            $absissa,
            $ordinate
        );
    }

    public function moveUp(): self
    {
        return new self();
    }

    public function coordinate(string $name): int
    {
        return 0;
    }
}
