<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Area\Cartesian\CartesianArea;
use Core\Rover\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianArea;
use Core\Rover\Domain\Rover\Cartesian\CartesianCardinalCoordinateRover;
use Core\Rover\Domain\Rover\Cartesian\CartesianCardinalCoordinateRoverPosition;
use Core\Rover\Domain\Rover\Cartesian\CartesianRover;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\EastCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\NorthCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\SouthCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\WestCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Rover;
use Core\Rover\Domain\Rover\RoverPosition;

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
        $cartesianCardinalCoordinateRover = $this->givenCartesianRover();

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

        $cartesianRover = CartesianCardinalCoordinateRover::create(
            $cartesianArea,
            $cartesianCardinalDirection,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE
        );

        self::assertSame(
            $cartesianCardinalDirection->value(),
            $cartesianRover->position()->cardinal()
        );
    }

    public function testShouldReturnTheAbsissa(): void
    {
        $cartesianCardinalCoordinateRover = $this->givenCartesianRover();

        self::assertSame(
            self::POSITION_ABSCISSA,
            $cartesianCardinalCoordinateRover->position()->abscissa()
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

    private function givenCartesianRover(): CartesianCardinalCoordinateRover
    {
        $cartesianArea = $this->givenCartesianArea();

        $cartesianCardinalDirection = $this->givenCartesianCardinalDirection();

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
}
