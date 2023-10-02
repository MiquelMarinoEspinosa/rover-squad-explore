<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Rover;
use Core\Rover\Domain\Rover\RoverPosition;
use Core\Rover\Domain\Rover\Cartesian\CartesianRover;
use Core\Rover\Domain\Rover\Area\Cartesian\CartesianArea;
use Core\Rover\Domain\Rover\Cartesian\CartesianCardinalCoordinateRover;
use Core\Rover\Domain\Rover\Cartesian\CartesianCardinalCoordinateRoverPosition;
use Core\Rover\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianArea;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\EastCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\WestCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\NorthCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\SouthCardinalCartesianDirection;

final class CartesianCardinalCoordinateRoverTest extends TestCase
{
    private const AREA_UPPER_RIGHT_ABSCISSA = 5;
    private const AREA_UPPER_RIGHT_ORDINATE = self::AREA_UPPER_RIGHT_ABSCISSA;
    private const POSITION_ABSCISSA         = 0;
    private const POSITION_ORDINATE         = 1;

    public function testShouldCreateCartesianCardinalCoordinateRover(): void
    {
        $cartesianArea = $this->givenCartesianArea();

        $cartesianCardinalDirection = $this->givenCartesianCardinalDirection();

        $cartesianCardinalCoordinateRover = CartesianCardinalCoordinateRover::create(
            $cartesianArea,
            $cartesianCardinalDirection,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE
        );

        self::assertInstanceOf(
            CartesianCardinalCoordinateRover::class,
            $cartesianCardinalCoordinateRover
        );

        self::assertInstanceOf(
            CartesianRover::class,
            $cartesianCardinalCoordinateRover
        );

        self::assertInstanceOf(
            Rover::class,
            $cartesianCardinalCoordinateRover
        );
    }

    public function testShouldReturnTheData(): void
    {
        $cartesianCardinalDirection = $this->givenCartesianCardinalDirection();

        $cartesianCardinalCoordinateRover = $this->givenCartesianRover(
            $cartesianCardinalDirection
        );

        $cartesianCardinalCoordinateRoverPosition = $cartesianCardinalCoordinateRover->position();

        self::assertInstanceOf(
            CartesianCardinalCoordinateRoverPosition::class,
            $cartesianCardinalCoordinateRoverPosition
        );

        self::assertInstanceOf(
            RoverPosition::class,
            $cartesianCardinalCoordinateRoverPosition
        );
    }

    /**
     * @dataProvider cardinalDirectionProvider
     */
    public function testShouldReturnTheCardinalDirection(
        CartesianCardinalDirection $cartesianCardinalDirection
    ): void {
        $cartesianArea = $this->givenCartesianArea();

        $cartesianCardinalCoordinateRover = CartesianCardinalCoordinateRover::create(
            $cartesianArea,
            $cartesianCardinalDirection,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE
        );

        self::assertSame(
            $cartesianCardinalDirection->value(),
            $cartesianCardinalCoordinateRover->position()->cardinal()
        );
    }

    public function testShouldReturnTheAbsissa(): void
    {
        $cartesianCardinalDirection = $this->givenCartesianCardinalDirection();

        $cartesianCardinalCoordinateRover = $this->givenCartesianRover(
            $cartesianCardinalDirection
        );

        self::assertSame(
            self::POSITION_ABSCISSA,
            $cartesianCardinalCoordinateRover->position()->abscissa()
        );
    }

    public function testShouldReturnTheOrdinate(): void
    {
        $cartesianCardinalDirection = $this->givenCartesianCardinalDirection();

        $cartesianCardinalCoordinateRover = $this->givenCartesianRover(
            $cartesianCardinalDirection
        );

        self::assertSame(
            self::POSITION_ORDINATE,
            $cartesianCardinalCoordinateRover->position()->ordinate()
        );
    }

    /**
     * @dataProvider cardinalDirectionRotateLeftProvider
     */
    public function testShouldRotateLeft(
        CartesianCardinalDirection $cartesianCardinalDirection,
        CartesianCardinalDirection $expectedCardinalDirection,
    ): void {
        $cartesianCardinalCoordinateRover = $this->givenCartesianRover(
            $cartesianCardinalDirection
        );

        $cartesianCardinalCoordinateRover = $this->whenRotateLeft(
            $cartesianCardinalCoordinateRover
        );

        $this->thenShouldHaveBeenTurnLeft(
            $cartesianCardinalCoordinateRover,
            $expectedCardinalDirection
        );
    }

    public static function cardinalDirectionProvider(): array
    {
        return [
            'east'  => [new EastCardinalCartesianDirection],
            'north' => [new NorthCardinalCartesianDirection],
            'south' => [new SouthCardinalCartesianDirection],
            'west'  => [new WestCardinalCartesianDirection]
        ];
    }

    public static function cardinalDirectionRotateLeftProvider(): array
    {
        return [
            'east-north' => [
                new EastCardinalCartesianDirection,
                new NorthCardinalCartesianDirection
            ],
            'north-west' => [
                new NorthCardinalCartesianDirection,
                new WestCardinalCartesianDirection
            ],
            'south-east' => [
                new SouthCardinalCartesianDirection,
                new EastCardinalCartesianDirection
            ],
            'west-south' => [
                new WestCardinalCartesianDirection,
                new SouthCardinalCartesianDirection
            ]
        ];
    }

    private function givenCartesianRover(
        CartesianCardinalDirection $cartesianCardinalDirection
    ): CartesianCardinalCoordinateRover {
        $cartesianArea = $this->givenCartesianArea();

        return CartesianCardinalCoordinateRover::create(
            $cartesianArea,
            $cartesianCardinalDirection,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE
        );
    }

    private function givenCartesianArea(): CartesianArea
    {
        return RectangularCartesianArea::createWithUpperRightCoordinates(
            self::AREA_UPPER_RIGHT_ABSCISSA,
            self::AREA_UPPER_RIGHT_ORDINATE
        );
    }

    private function givenCartesianCardinalDirection(): CartesianCardinalDirection
    {
        return new NorthCardinalCartesianDirection;
    }

    private function whenRotateLeft(
        CartesianCardinalCoordinateRover $cartesianCardinalCoordinateRover
    ): CartesianCardinalCoordinateRover {

        return $cartesianCardinalCoordinateRover->rotateLeft();
    }

    private function thenShouldHaveBeenTurnLeft(
        CartesianCardinalCoordinateRover $cartesianCardinalCoordinateRover,
        CartesianCardinalDirection $expectedCardinalDirection
    ): void {
        self::assertSame(
            $expectedCardinalDirection->value(),
            $cartesianCardinalCoordinateRover->position()->cardinal()
        );
    }
}
