<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point;

interface Point
{
    public function moveUp(): self;

    public function coordinate(string $name): int;

    public function horizontal(): int;
}
