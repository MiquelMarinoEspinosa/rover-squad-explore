<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Cartesian\Cardinal\Coordinate;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\RoverPosition;
use Core\Rover\Domain\Rover\Cartesian\CartesianRoverPosition;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverPosition;

final class CartesianCardinalCoordinateRoverPositionTest extends TestCase
{
    private const CARDINAL = 'N';
    private const ABSCISSA = 0;
    private const ORDINATE = 1;

    private CartesianCardinalCoordinateRoverPosition $cartesianCardinalCoordinateRoverPosition;

    protected function setUp(): void
    {
        $this->cartesianCardinalCoordinateRoverPosition = new CartesianCardinalCoordinateRoverPosition(
            self::CARDINAL,
            self::ABSCISSA,
            self::ORDINATE
        );
    }

    public function testShouldCreateTheCartesianCardinalCoordinateRoverPosition(): void
    {
        $cartesianCardinalCoordinateRoverPosition = new CartesianCardinalCoordinateRoverPosition(
            self::CARDINAL,
            self::ABSCISSA,
            self::ORDINATE
        );

        self::assertInstanceOf(
            CartesianCardinalCoordinateRoverPosition::class,
            $cartesianCardinalCoordinateRoverPosition
        );

        self::assertInstanceOf(
            CartesianRoverPosition::class,
            $cartesianCardinalCoordinateRoverPosition
        );

        self::assertInstanceOf(
            RoverPosition::class,
            $cartesianCardinalCoordinateRoverPosition
        );
    }

    public function testShouldReturnCardinal(): void
    {
        self::assertSame(
            self::CARDINAL,
            $this->cartesianCardinalCoordinateRoverPosition->cardinal()
        );
    }

    public function testShouldReturnAbscissa(): void
    {
        self::assertSame(
            self::ABSCISSA,
            $this->cartesianCardinalCoordinateRoverPosition->abscissa()
        );
    }

    public function testShouldReturnOrdinate(): void
    {
        self::assertSame(
            self::ORDINATE,
            $this->cartesianCardinalCoordinateRoverPosition->ordinate()
        );
    }
}
