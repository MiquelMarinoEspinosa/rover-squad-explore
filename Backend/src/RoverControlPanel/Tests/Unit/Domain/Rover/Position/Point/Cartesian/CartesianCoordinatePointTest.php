<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point\Cartesian;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian\CartesianCoordinateNotFound;
use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Point;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian\CartesianCoordinatePoint;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian\CartesianPoint;

final class CartesianCoordinatePointTest extends TestCase
{
    private const ABSCISSA      = 1;
    private const ORDINATE      = 2;
    private const ABSCISSA_NAME = 'abscissa';
    private const ORDINATE_NAME = 'ordinate';

    private CartesianCoordinatePoint $cartesianPoint;

    protected function setUp(): void
    {
        $this->cartesianPoint = CartesianCoordinatePoint::create(
            self::ABSCISSA,
            self::ORDINATE
        );
    }

    public function testShouldCreateCartesianPoint(): void
    {
        $cartesianPoint = CartesianCoordinatePoint::create(
            self::ABSCISSA,
            self::ORDINATE
        );

        self::assertInstanceOf(
            CartesianCoordinatePoint::class,
            $cartesianPoint
        );

        self::assertInstanceOf(
            CartesianPoint::class,
            $cartesianPoint
        );

        self::assertInstanceOf(
            Point::class,
            $cartesianPoint
        );
    }

    public function testShouldReturnTheCoordinateNames(): void
    {
        self::assertSame(
            [
                self::ABSCISSA_NAME,
                self::ORDINATE_NAME
            ],
            $this->cartesianPoint->coordinateNames()
        );
    }

    public function testShouldThrowAnExceptionWhenCoordinateNotFound(): void
    {
        self::expectException(CartesianCoordinateNotFound::class);

        $this->cartesianPoint->coordinateValue('');
    }

    public function testShouldReturnTheAbscissaCoordinateValue(): void
    {
        self::assertSame(
            self::ABSCISSA,
            $this->cartesianPoint->coordinateValue(self::ABSCISSA_NAME)
        );
    }

    public function testShouldReturnTheOrdinateCoordinateValue(): void
    {
        self::assertSame(
            self::ORDINATE,
            $this->cartesianPoint->coordinateValue(self::ORDINATE_NAME)
        );
    }

    public function testShouldNotMoveAbscissaWhenMoveUp(): void
    {
        $movedCartesianPoint = $this->cartesianPoint->moveUp();

        self::assertSame(
            $movedCartesianPoint->coordinateValue(self::ABSCISSA_NAME),
            $this->cartesianPoint->coordinateValue(self::ABSCISSA_NAME)
        );
    }

    public function testShouldMoveOrdinateWhenMoveUp(): void
    {
        $movedCartesianPoint = $this->cartesianPoint->moveUp();

        self::assertSame(
            $movedCartesianPoint->coordinateValue(self::ORDINATE_NAME),
            $this->cartesianPoint->coordinateValue(self::ORDINATE_NAME) + 1
        );
    }
}
