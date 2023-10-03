<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover;

use Core\Rover\Domain\Collection\Collection;
use Core\Rover\Domain\Collection\CollectionItem;

final class RoverSquad implements Collection
{
    private ?Rover $rover = null;

    public function empty(): bool
    {
        return true;
    }

    public function next(): bool
    {
        return false;
    }

    public function current(): Rover
    {
        if ($this->rover) {
            return $this->rover;
        }

        throw RoverSquadOutOfRange::create();
    }

    public function add(CollectionItem $item): void
    {
        $this->rover = $item;
    }
}
