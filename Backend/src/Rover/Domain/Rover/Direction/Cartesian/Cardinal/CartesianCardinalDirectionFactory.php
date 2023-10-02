<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal;

final class CartesianCardinalDirectionFactory implements CartesianCardinalDirectionAbstractFactory
{
    private const EAST_VALUE  = 'E';
    private const NORTH_VALUE = 'N';
    private const SOUTH_VALUE = 'S';
    private const WEST_VALUE  = 'W';

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
        return match ($value) {
            self::EAST_VALUE  => new EastCardinalCartesianDirection,
            self::SOUTH_VALUE => new SouthCardinalCartesianDirection,
            self::WEST_VALUE  => new WestCardinalCartesianDirection,
            default => new NorthCardinalCartesianDirection
        };
    }
}
