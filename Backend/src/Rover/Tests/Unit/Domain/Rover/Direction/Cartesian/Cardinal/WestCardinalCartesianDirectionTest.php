<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Direction\Cartesian\Cardinal;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Direction\Direction;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\WestCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\NorthCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\SouthCardinalCartesianDirection;

final class WestCardinalCartesianDirectionTest extends TestCase
{
    public function testShouldCreateWestCardinalCartesianDirection(): void
    {
        $westCartesianCardinalDirection = new WestCardinalCartesianDirection;

        self::assertInstanceOf(
            WestCardinalCartesianDirection::class,
            $westCartesianCardinalDirection
        );

        self::assertInstanceOf(
            CartesianCardinalDirection::class,
            $westCartesianCardinalDirection
        );

        self::assertInstanceOf(
            Direction::class,
            $westCartesianCardinalDirection
        );
    }

    public function testShouldPointSouthWhenRotateLeft(): void
    {
        $westCartesianCardinalDirection = $this->givenWestCartesianCardinalDirection();

        self::assertInstanceOf(
            SouthCardinalCartesianDirection::class,
            $westCartesianCardinalDirection->rotateLeft()
        );
    }

    public function testShouldPointNorthWhenRotateRight(): void
    {
        $westCartesianCardinalDirection = $this->givenWestCartesianCardinalDirection();

        self::assertInstanceOf(
            NorthCardinalCartesianDirection::class,
            $westCartesianCardinalDirection->rotateRight()
        );
    }

    private function givenWestCartesianCardinalDirection(): WestCardinalCartesianDirection
    {
        return new WestCardinalCartesianDirection;
    }
}
