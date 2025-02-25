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
    public const VALUE = 'E';

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

    public function testShouldMoveThePointRightWhenMoveForward(): void
    {
        $eastCartesianCardinalDirection = $this->givenEastCartesianCardinalDirection();

        $cartesianCoordinatePoint = $this->givenCartesianCoordinatePoint();

        $movedCartesianCoordinatePoint = $this->whenMoveForward(
            $eastCartesianCardinalDirection,
            $cartesianCoordinatePoint
        );

        $this->thenThePointShouldHaveMovedRight(
            $cartesianCoordinatePoint,
            $movedCartesianCoordinatePoint
        );
    }

    public function testShouldReturnTheValue(): void
    {
        $eastCartesianCardinalDirection = $this->givenEastCartesianCardinalDirection();

        self::assertSame(
            self::VALUE,
            $eastCartesianCardinalDirection->value()
        );
    }

    private function givenEastCartesianCardinalDirection(): EastCardinalCartesianDirection
    {
        return new EastCardinalCartesianDirection;
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
        EastCardinalCartesianDirection $eastCartesianCardinalDirection,
        CartesianCoordinatePoint $cartesianCoordinatePoint
    ): CartesianCoordinatePoint {

        return $eastCartesianCardinalDirection->moveForward(
            $cartesianCoordinatePoint
        );
    }

    private function thenThePointShouldHaveMovedRight(
        CartesianCoordinatePoint $cartesianCoordinatePoint,
        CartesianCoordinatePoint $movedCartesianCoordinatePoint
    ): void {
        $cartesianCoordinatePointData      = $cartesianCoordinatePoint->data();
        $movedCartesianCoordinatePointData = $movedCartesianCoordinatePoint->data();

        self::assertSame(
            $cartesianCoordinatePointData->abscissa() + 1,
            $movedCartesianCoordinatePointData->abscissa()
        );

        self::assertSame(
            $cartesianCoordinatePointData->ordinate(),
            $movedCartesianCoordinatePointData->ordinate()
        );
    }
}
