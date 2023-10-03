<?php

declare(strict_types=1);

namespace Core\Rover\Application\Explore\Request\Mapper\Rover;

use Core\Rover\Domain\Rover\RoverBuilderData;

interface RoverBuilderDataMapper
{
    public function map(): RoverBuilderData;
}
