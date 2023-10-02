<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Area\Cartesian;

interface CartesianAreaBuilder
{
    public function create(
        CartesianAreaBuilderData $data
    ): CartesianArea;
}
