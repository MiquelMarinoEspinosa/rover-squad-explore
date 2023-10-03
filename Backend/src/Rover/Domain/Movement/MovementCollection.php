<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Movement;

use Core\Rover\Domain\Collection\Collection;
use Core\Rover\Domain\Collection\CollectionItem;

final class MovementCollection implements Collection
{
    private array $movements;
    private int $index;
    private int $size;

    public function __construct()
    {
        $this->movements = [];
        $this->index     = 0;
        $this->size      = 0;
    }

    public function empty(): bool
    {
        return 0 === $this->size;
    }

    public function next(): void
    {
        $this->index = $this->index + 1;
    }

    public function current(): Movement
    {
        if (!isset($this->movements[$this->index])) {
            throw MovementCollectionOutOfRange::create();
        }

        return $this->movements[$this->index];
    }

    public function add(CollectionItem $item): void
    {
        $this->movements[] = $item;
        $this->size        = $this->size + 1;
    }

    public function end(): bool
    {
        return $this->size === $this->index;
    }
}
