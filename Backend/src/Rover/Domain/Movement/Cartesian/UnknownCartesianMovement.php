<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Movement\Cartesian;

use Core\Rover\Domain\Movement\UnknownMovement;
use Exception;

final class UnknownCartesianMovement extends Exception implements UnknownMovement
{
    public static function create(): self
    {
        return new self;
    }
}
