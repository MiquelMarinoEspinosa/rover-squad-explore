<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Direction\Cartesian\Cardinal;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Direction\Direction;
use Core\Rover\Domain\Rover\Point\Cartesian\CartesianCoordinatePoint;
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
        $eastCartesianCardinalDirection = $this->givenEastCartesianCardinalDirection();

        self::assertInstanceOf(
            NorthCardinalCartesianDirection::class,
            $eastCartesianCardinalDirection->rotateLeft()
        );
    }

    public function testShouldPointSouthWhenRotateRight(): void
    {
        $eastCartesianCardinalDirection = $this->givenEastCartesianCardinalDirection();

        self::assertInstanceOf(
            SouthCardinalCartesianDirection::class,
            $eastCartesianCardinalDirection->rotateRight()
        );
    }

    public function testShouldMoveThePointToRightWhenMoveForward(): void
    {
        $abscissa = 0;
        $ordinate = 0;
        
        $eastCartesianCardinalDirection = $this->givenEastCartesianCardinalDirection();

        $cartesianCoordinatePoint = CartesianCoordinatePoint::create(
            $abscissa, 
            $ordinate
        );

        $movedCartesianCoordinatePoint = $eastCartesianCardinalDirection->moveForward(
            $cartesianCoordinatePoint
        );

        self::assertInstanceOf(
            CartesianCoordinatePoint::class,
            $movedCartesianCoordinatePoint
        );

        self::assertSame(
            $abscissa + 1,
            $movedCartesianCoordinatePoint->data()->abscissa()
        );

        self::assertSame(
            $ordinate,
            $movedCartesianCoordinatePoint->data()->ordinate()
        );
    }

    private function givenEastCartesianCardinalDirection(): EastCardinalCartesianDirection
    {
        return new EastCardinalCartesianDirection;
    }
}
