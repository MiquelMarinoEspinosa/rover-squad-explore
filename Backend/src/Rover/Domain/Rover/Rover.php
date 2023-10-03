<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover;

use Core\Rover\Domain\Collection\CollectionItem;

interface Rover extends CollectionItem
{
    public function position(): RoverPosition;
}
