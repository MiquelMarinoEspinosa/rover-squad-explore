<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Direction\Cartesian\Cardinal;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Direction\Direction;
use Core\Rover\Domain\Rover\Point\Cartesian\CartesianCoordinatePoint;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\WestCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\NorthCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\SouthCardinalCartesianDirection;

final class WestCardinalCartesianDirectionTest extends TestCase
{
    private const VALUE = 'W';

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

    public function testShouldMoveThePointLeftWhenMoveForward(): void
    {
        $westCartesianCardinalDirection = $this->givenWestCartesianCardinalDirection();

        $cartesianCoordinatePoint = $this->givenCartesianCoordinatePoint();

        $movedCartesianCoordinatePoint = $this->whenMoveForward(
            $westCartesianCardinalDirection,
            $cartesianCoordinatePoint
        );

        $this->thenThePointShouldHaveMovedLeft(
            $cartesianCoordinatePoint,
            $movedCartesianCoordinatePoint
        );
    }

    public function testShouldReturnTheValue(): void
    {
        $westCartesianCardinalDirection = $this->givenWestCartesianCardinalDirection();

        self::assertSame(
            self::VALUE,
            $westCartesianCardinalDirection->value()
        );
    }

    private function givenWestCartesianCardinalDirection(): WestCardinalCartesianDirection
    {
        return new WestCardinalCartesianDirection;
    }

    private function givenCartesianCoordinatePoint(): CartesianCoordinatePoint
    {
        $abscissa = 0;
        $ordinate = 0;

        return CartesianCoordinatePoint::create(
            $abscissa,
            $ordinate
        );
    }

    private function whenMoveForward(
        WestCardinalCartesianDirection $westCartesianCardinalDirection,
        CartesianCoordinatePoint $cartesianCoordinatePoint
    ): CartesianCoordinatePoint {

        return $westCartesianCardinalDirection->moveForward(
            $cartesianCoordinatePoint
        );
    }

    private function thenThePointShouldHaveMovedLeft(
        CartesianCoordinatePoint $cartesianCoordinatePoint,
        CartesianCoordinatePoint $movedCartesianCoordinatePoint
    ): void {
        $cartesianCoordinatePointData      = $cartesianCoordinatePoint->data();
        $movedCartesianCoordinatePointData = $movedCartesianCoordinatePoint->data();

        self::assertSame(
            $cartesianCoordinatePointData->abscissa() - 1,
            $movedCartesianCoordinatePointData->abscissa()
        );

        self::assertSame(
            $cartesianCoordinatePointData->ordinate(),
            $movedCartesianCoordinatePointData->ordinate()
        );
    }
}
