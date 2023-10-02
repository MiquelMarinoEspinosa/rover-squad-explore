<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal;

final class CartesianCardinalDirectionFactory implements CartesianCardinalDirectionAbstractFactory
{
    private static ?self $instance = null;

    public static function getInstance(): self
    {
        if (null !== self::$instance) {
            return self::$instance;
        }

        self::$instance = new self();

        return self::$instance;
    }

    public function create(string $value): CartesianCardinalDirection
    {
        if ('E' === $value) {
            return new EastCardinalCartesianDirection;
        }
        
        return new NorthCardinalCartesianDirection;
    }
}
