<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Cartesian;

final class CartesianCardinalCoordinateRoverBuilder implements CartesianRoverBuilder
{
    private static ?self $instance = null;

    public static function getInstance(): self
    {
        if (null !== self::$instance) {
            return self::$instance;
        }

        self::$instance = new self;

        return self::$instance;
    }
}
