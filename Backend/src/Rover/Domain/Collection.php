<?php

declare(strict_types=1);

namespace Core\Rover\Domain;

interface Collection
{
    public function empty(): bool;

    public function next(): bool;
}