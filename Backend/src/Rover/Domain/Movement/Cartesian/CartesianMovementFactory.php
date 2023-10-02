<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Movement\Cartesian;

final class CartesianMovementFactory implements CartesianMovementAbstractFactory
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
