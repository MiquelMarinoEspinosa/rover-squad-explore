<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover;

interface Rover
{
    public function data(): RoverData;
}
