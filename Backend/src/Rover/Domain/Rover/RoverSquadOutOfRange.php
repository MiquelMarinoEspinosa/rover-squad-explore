<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover;

use Core\Rover\Domain\CollectionOutOfRange;
use Exception;

final class RoverSquadOutOfRange extends Exception implements CollectionOutOfRange
{
    public static function create(): self
    {
        return new self;
    }
}
