<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover;

use Core\Rover\Domain\Collection\Collection;
use Core\Rover\Domain\Collection\CollectionItem;

final class RoverSquad implements Collection
{
    private array $rovers;
    private int $index;
    private int $size;

    public function __construct()
    {
        $this->rovers = [];
        $this->index  = 0;
        $this->size   = 0;
    }

    public function empty(): bool
    {
        return 0 === $this->size;
    }

    public function next(): bool
    {
        $this->index = $this->index + 1;

        return $this->size > $this->index;
    }

    public function current(): Rover
    {
        if (!isset($this->rovers[$this->index])) {
            throw RoverSquadOutOfRange::create();
        }

        return $this->rovers[$this->index];
    }

    public function add(CollectionItem $item): void
    {
        $this->rovers[] = $item;
        $this->size     = $this->size + 1;
    }
}
