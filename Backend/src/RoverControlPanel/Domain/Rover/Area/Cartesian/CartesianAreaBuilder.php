<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Area\Cartesian;

interface CartesianAreaBuilder
{
    public function create(
        CartesianAreaBuilderData $data
    ): CartesianArea;
}
