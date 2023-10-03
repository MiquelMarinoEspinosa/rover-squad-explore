<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover;

interface RoverBuilder
{
    public function build(RoverBuilderData $data): Rover;
}
