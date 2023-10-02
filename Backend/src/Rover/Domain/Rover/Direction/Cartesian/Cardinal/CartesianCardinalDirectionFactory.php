<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal;

final class CartesianCardinalDirectionFactory implements CartesianCardinalDirectionAbstractFactory
{
    private const EAST_VALUE = 'E';

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
        if (self::EAST_VALUE === $value) {
            return new EastCardinalCartesianDirection;
        }

        if ('S' == $value) {
            return new SouthCardinalCartesianDirection;
        }

        return new NorthCardinalCartesianDirection;
    }
}
