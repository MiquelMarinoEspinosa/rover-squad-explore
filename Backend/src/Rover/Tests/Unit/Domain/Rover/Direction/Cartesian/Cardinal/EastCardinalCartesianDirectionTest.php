<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Direction\Cartesian\Cardinal;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Direction\Direction;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\EastCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\NorthCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\SouthCardinalCartesianDirection;

final class EastCardinalCartesianDirectionTest extends TestCase
{
    public function testShouldCreateEastCardinalCartesianDirection(): void
    {
        $eastCartesianCardinalDirection = new EastCardinalCartesianDirection;

        self::assertInstanceOf(
            EastCardinalCartesianDirection::class,
            $eastCartesianCardinalDirection
        );

        self::assertInstanceOf(
            CartesianCardinalDirection::class,
            $eastCartesianCardinalDirection
        );

        self::assertInstanceOf(
            Direction::class,
            $eastCartesianCardinalDirection
        );
    }

    public function testShouldPointNorthWhenRotateLeft(): void
    {
        $eastCartesianCardinalDirection = new EastCardinalCartesianDirection;

        self::assertInstanceOf(
            NorthCardinalCartesianDirection::class,
            $eastCartesianCardinalDirection->rotateLeft()
        );
    }

    public function testShouldPointSouthWhenRotateRight(): void
    {
        $eastCartesianCardinalDirection = new EastCardinalCartesianDirection;

        self::assertInstanceOf(
            SouthCardinalCartesianDirection::class,
            $eastCartesianCardinalDirection->rotateRight()
        );
    }
}
