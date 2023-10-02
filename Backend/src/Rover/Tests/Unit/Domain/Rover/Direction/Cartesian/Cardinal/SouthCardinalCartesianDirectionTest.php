<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Direction\Cartesian\Cardinal;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Direction\Direction;
use Core\Rover\Domain\Rover\Point\Cartesian\CartesianCoordinatePoint;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\EastCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\WestCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\SouthCardinalCartesianDirection;

final class SouthCardinalCartesianDirectionTest extends TestCase
{
    private const VALUE = 'S';

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

    public function testShouldMoveThePointDownWhenMoveForward(): void
    {
        $southCartesianCardinalDirection = $this->givenSouthCartesianCardinalDirection();

        $cartesianCoordinatePoint = $this->givenCartesianCoordinatePoint();

        $movedCartesianCoordinatePoint = $this->whenMoveForward(
            $southCartesianCardinalDirection,
            $cartesianCoordinatePoint
        );

        $this->thenThePointShouldHaveMovedDown(
            $cartesianCoordinatePoint,
            $movedCartesianCoordinatePoint
        );
    }

    public function testShouldReturnTheValue(): void
    {
        $southCartesianCardinalDirection = $this->givenSouthCartesianCardinalDirection();

        self::assertSame(
            self::VALUE,
            $southCartesianCardinalDirection->value()
        );
    }

    private function givenSouthCartesianCardinalDirection(): SouthCardinalCartesianDirection
    {
        return new SouthCardinalCartesianDirection;
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
        SouthCardinalCartesianDirection $southCartesianCardinalDirection,
        CartesianCoordinatePoint $cartesianCoordinatePoint
    ): CartesianCoordinatePoint {

        return $southCartesianCardinalDirection->moveForward(
            $cartesianCoordinatePoint
        );
    }

    private function thenThePointShouldHaveMovedDown(
        CartesianCoordinatePoint $cartesianCoordinatePoint,
        CartesianCoordinatePoint $movedCartesianCoordinatePoint
    ): void {
        $cartesianCoordinatePointData      = $cartesianCoordinatePoint->data();
        $movedCartesianCoordinatePointData = $movedCartesianCoordinatePoint->data();

        self::assertSame(
            $cartesianCoordinatePointData->abscissa(),
            $movedCartesianCoordinatePointData->abscissa()
        );

        self::assertSame(
            $cartesianCoordinatePointData->ordinate() - 1,
            $movedCartesianCoordinatePointData->ordinate()
        );
    }
}
