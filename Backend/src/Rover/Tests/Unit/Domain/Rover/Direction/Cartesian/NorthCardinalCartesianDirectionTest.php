<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Direction\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Direction\Direction;
use Core\Rover\Domain\Rover\Direction\Cartesian\CartesianCardinalDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\NorthCardinalCartesianDirection;

final class NorthCardinalCartesianDirectionTest extends TestCase
{
    public function testShouldCreateNorthCartesianCardinalDirection(): void
    {
        $northCartesianCardinalDirection = new NorthCardinalCartesianDirection();

        self::assertInstanceOf(
            NorthCardinalCartesianDirection::class,
            $northCartesianCardinalDirection
        );

        self::assertInstanceOf(
            CartesianCardinalDirection::class,
            $northCartesianCardinalDirection
        );

        self::assertInstanceOf(
            Direction::class,
            $northCartesianCardinalDirection
        );
    }
}
