<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Collection;

interface Collection
{
    public function empty(): bool;

    public function next(): void;

    public function current(): CollectionItem;

    public function add(CollectionItem $item): void;

    public function end(): bool;
}