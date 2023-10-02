<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Area\Cartesian\CartesianArea;
use Core\Rover\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianArea;
use Core\Rover\Domain\Rover\Cartesian\CartesianCardinalCoordinateRover;
use Core\Rover\Domain\Rover\Cartesian\CartesianCardinalCoordinateRoverData;
use Core\Rover\Domain\Rover\Cartesian\CartesianRover;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\EastCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\NorthCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\SouthCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\WestCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Rover;
use Core\Rover\Domain\Rover\RoverData;

final class CartesianCardinalCoordinateRoverTest extends TestCase
{
    private const AREA_UPPER_RIGHT_ABSCISSA = 5;
    private const AREA_UPPER_RIGHT_ORDINATE = self::AREA_UPPER_RIGHT_ABSCISSA;
    private const POINT_ABSCISSA            = 0;
    private const POINT_ORDINATE            = self::POINT_ABSCISSA;

    public function testShouldCreateCartesianCardinalCoordinateRover(): void
    {
        $cartesianArea = $this->givenCartesianArea();

        $cartesianCardinalDirection = $this->givenCartesianCardinalDirection();

        $cartesianCardinalCoordinateRover = CartesianCardinalCoordinateRover::create(
            $cartesianArea,
            $cartesianCardinalDirection,
            self::POINT_ABSCISSA,
            self::POINT_ORDINATE
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

        $cartesianCardinalCoordinateRoverData = $cartesianCardinalCoordinateRover->position();

        self::assertInstanceOf(
            CartesianCardinalCoordinateRoverData::class,
            $cartesianCardinalCoordinateRoverData
        );

        self::assertInstanceOf(
            RoverData::class,
            $cartesianCardinalCoordinateRoverData
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
            self::POINT_ABSCISSA,
            self::POINT_ORDINATE
        );

        self::assertSame(
            $cartesianCardinalDirection->value(),
            $cartesianRover->position()->cardinal()
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
            self::POINT_ABSCISSA,
            self::POINT_ORDINATE
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
