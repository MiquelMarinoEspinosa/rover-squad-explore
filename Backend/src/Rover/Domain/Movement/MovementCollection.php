<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Movement;

use Core\Rover\Domain\Collection\Collection;
use Core\Rover\Domain\Collection\CollectionItem;

final class MovementCollection implements Collection
{
    public function empty(): bool
    {
    }

    public function next(): bool
    {
    }

    public function current(): CollectionItem
    {
    }

    public function add(CollectionItem $item): void
    {
    }
}
