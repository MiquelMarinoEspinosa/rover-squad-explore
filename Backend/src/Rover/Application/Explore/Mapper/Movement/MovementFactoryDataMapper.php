<?php

declare(strict_types=1);

namespace Core\Rover\Application\Explore\Mapper\Movement;

use Core\Rover\Domain\Movement\MovementFactoryData;

interface MovementFactoryDataMapper
{
    public function map(): MovementFactoryData;
}
