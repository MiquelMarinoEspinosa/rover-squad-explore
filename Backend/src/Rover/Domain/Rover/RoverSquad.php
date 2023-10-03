<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover;

use Core\Rover\Domain\Collection\Collection;
use Core\Rover\Domain\Collection\CollectionItem;

final class RoverSquad implements Collection
{
    public function empty(): bool
    {
        return true;
    }

    public function next(): bool
    {
        return true;
    }

    public function current(): CollectionItem
    {
        throw RoverSquadOutOfRange::create();
    }
}
