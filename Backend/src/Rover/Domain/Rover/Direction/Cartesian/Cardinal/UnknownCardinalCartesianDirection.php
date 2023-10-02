<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal;

use Exception;
use Core\Rover\Domain\Rover\Direction\UnknownDirection;

final class UnknownCardinalCartesianDirection extends Exception implements UnknownDirection
{
    public static function create(string $value): self
    {
        return new self();
    }
}
