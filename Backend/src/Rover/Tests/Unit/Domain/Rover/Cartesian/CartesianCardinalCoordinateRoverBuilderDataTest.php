<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Cartesian\CartesianRoverBuilderData;
use Core\Rover\Domain\Rover\Cartesian\CartesianCardinalCoordinateRoverBuilderData;
use Core\Rover\Domain\Rover\RoverBuilderData;

final class CartesianCardinalCoordinateRoverBuilderDataTest extends TestCase
{
    private const AREA_UPPER_RIGHT_ABSCISSA = 5;
    private const AREA_UPPER_RIGHT_ORDINATE = 6;
    private const POSITION_CARDINAL         = 'N';
    private const POSITION_ABSCISSA         = 0;
    private const POSITION_ORDINATE         = 1;

    private CartesianCardinalCoordinateRoverBuilderData $cartesianCardinalCoordinateRoverBuilderData;

    protected function setUp(): void
    {
        $this->cartesianCardinalCoordinateRoverBuilderData = new CartesianCardinalCoordinateRoverBuilderData(
            self::AREA_UPPER_RIGHT_ABSCISSA,
            self::AREA_UPPER_RIGHT_ORDINATE,
            self::POSITION_CARDINAL,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE
        );
    }

    public function testShouldCreateTheCartesianCardinalCoordinateRoverBuilderData(): void
    {
        $cartesianCardinalCoordinateRoverBuilderData = new CartesianCardinalCoordinateRoverBuilderData(
            self::AREA_UPPER_RIGHT_ABSCISSA,
            self::AREA_UPPER_RIGHT_ORDINATE,
            self::POSITION_CARDINAL,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE
        );

        self::assertInstanceOf(
            CartesianCardinalCoordinateRoverBuilderData::class,
            $cartesianCardinalCoordinateRoverBuilderData
        );

        self::assertInstanceOf(
            CartesianRoverBuilderData::class,
            $cartesianCardinalCoordinateRoverBuilderData
        );

        self::assertInstanceOf(
            RoverBuilderData::class,
            $cartesianCardinalCoordinateRoverBuilderData
        );
    }

    public function testShouldReturnTheAreUpperRightAbscissa(): void
    {
        self::assertSame(
            self::AREA_UPPER_RIGHT_ABSCISSA,
            $this->cartesianCardinalCoordinateRoverBuilderData
                ->areaUpperRightAbscissa()
        );
    }

    public function testShouldReturnTheAreUpperRightOrdinate(): void
    {
        self::assertSame(
            self::AREA_UPPER_RIGHT_ORDINATE,
            $this->cartesianCardinalCoordinateRoverBuilderData
                ->areaUpperRightOrdinate()
        );
    }

    public function testShouldReturnThePositionCardinal(): void
    {
        self::assertSame(
            self::POSITION_CARDINAL,
            $this->cartesianCardinalCoordinateRoverBuilderData
                ->positionCardinal()
        );
    }

    public function testShouldReturnThePositionAbscissa(): void
    {
        self::assertSame(
            self::POSITION_ABSCISSA,
            $this->cartesianCardinalCoordinateRoverBuilderData
                ->positionAbscissa()
        );
    }

    public function testShouldReturnThePositionOrdinate(): void
    {
        self::assertSame(
            self::POSITION_ORDINATE,
            $this->cartesianCardinalCoordinateRoverBuilderData
                ->positionOrdinate()
        );
    }
}
