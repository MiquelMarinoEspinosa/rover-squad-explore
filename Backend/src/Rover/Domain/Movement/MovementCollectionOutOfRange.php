<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Movement;

use Core\Rover\Domain\Collection\CollectionOutOfRange;
use Exception;

final class MovementCollectionOutOfRange extends Exception implements CollectionOutOfRange
{
    public static function create(): self
    {
        return new self;
    }
}