<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover;

use Core\Rover\Domain\Collection;

final readonly class RoverSquad implements Collection
{
    public function empty(): bool
    {
        return true;
    }
}
