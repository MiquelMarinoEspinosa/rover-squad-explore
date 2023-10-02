<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Direction\Cartesian\Cardinal;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Direction\Direction;
use Core\Rover\Domain\Rover\Point\Cartesian\CartesianCoordinatePoint;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\EastCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\WestCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\NorthCardinalCartesianDirection;

final class NorthCardinalCartesianDirectionTest extends TestCase
{
    private const VALUE = 'N';
    
    public function testShouldCreateNorthCardinalCartesianDirection(): void
    {
        $northCartesianCardinalDirection = new NorthCardinalCartesianDirection;

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

    public function testShouldPointWestWhenRotateLeft(): void
    {
        $northCartesianCardinalDirection = $this->givenNorthCartesianCardinalDirection();

        self::assertInstanceOf(
            WestCardinalCartesianDirection::class,
            $northCartesianCardinalDirection->rotateLeft()
        );
    }

    public function testShouldPointEastWhenRotateRight(): void
    {
        $northCartesianCardinalDirection = $this->givenNorthCartesianCardinalDirection();

        self::assertInstanceOf(
            EastCardinalCartesianDirection::class,
            $northCartesianCardinalDirection->rotateRight()
        );
    }

    public function testShouldMoveThePointUpWhenMoveForward(): void
    {
        $northCartesianCardinalDirection = $this->givenNorthCartesianCardinalDirection();

        $cartesianCoordinatePoint = $this->givenCartesianCoordinatePoint();

        $movedCartesianCoordinatePoint = $this->whenMoveForward(
            $northCartesianCardinalDirection,
            $cartesianCoordinatePoint
        );

        $this->thenThePointShouldHaveMovedUp(
            $cartesianCoordinatePoint,
            $movedCartesianCoordinatePoint
        );
    }

    public function testShouldReturnTheValue(): void
    {
        $northCartesianCardinalDirection = $this->givenNorthCartesianCardinalDirection();

        self::assertSame(
            self::VALUE,
            $northCartesianCardinalDirection->value()
        );
    }

    private function givenNorthCartesianCardinalDirection(): NorthCardinalCartesianDirection
    {
        return new NorthCardinalCartesianDirection;
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
        NorthCardinalCartesianDirection $northCartesianCardinalDirection,
        CartesianCoordinatePoint $cartesianCoordinatePoint
    ): CartesianCoordinatePoint {

        return $northCartesianCardinalDirection->moveForward(
            $cartesianCoordinatePoint
        );
    }

    private function thenThePointShouldHaveMovedUp(
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
            $cartesianCoordinatePointData->ordinate() + 1,
            $movedCartesianCoordinatePointData->ordinate()
        );
    }
}
