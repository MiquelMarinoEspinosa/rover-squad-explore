<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Direction\Cartesian\Cardinal;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Direction\Direction;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\EastCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\SouthCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\WestCardinalCartesianDirection;

final class SouthCardinalCartesianDirectionTest extends TestCase
{
    public function testShouldCreateSouthCardinalCartesianDirection(): void
    {
        $southCartesianCardinalDirection = new SouthCardinalCartesianDirection;

        self::assertInstanceOf(
            SouthCardinalCartesianDirection::class,
            $southCartesianCardinalDirection
        );

        self::assertInstanceOf(
            CartesianCardinalDirection::class,
            $southCartesianCardinalDirection
        );

        self::assertInstanceOf(
            Direction::class,
            $southCartesianCardinalDirection
        );
    }

    public function testShouldPointEastWhenRotateLeft(): void
    {
        $southCartesianCardinalDirection = $this->givenSouthCartesianCardinalDirection();

        self::assertInstanceOf(
            EastCardinalCartesianDirection::class,
            $southCartesianCardinalDirection->rotateLeft()
        );
    }

    public function testShouldPointWestWhenRotateRight(): void
    {
        $southCartesianCardinalDirection = $this->givenSouthCartesianCardinalDirection();

        self::assertInstanceOf(
            WestCardinalCartesianDirection::class,
            $southCartesianCardinalDirection->rotateRight()
        );
    }

    private function givenSouthCartesianCardinalDirection(): SouthCardinalCartesianDirection
    {
        return new SouthCardinalCartesianDirection;
    }
}
