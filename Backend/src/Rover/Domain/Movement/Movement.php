<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Movement;

use Core\Rover\Domain\Rover\Rover;
use Core\Rover\Domain\Collection\CollectionItem;

interface Movement extends CollectionItem
{
    public function apply(Rover $cartesianRover): Rover;
}
