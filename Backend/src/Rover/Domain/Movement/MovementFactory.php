<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Movement;

interface MovementFactory
{
    public function create(MovementFactoryData $data): Movement;
}
