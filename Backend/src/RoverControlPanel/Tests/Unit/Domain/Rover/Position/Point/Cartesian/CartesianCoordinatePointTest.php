<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Point;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian\CartesianPoint;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian\CartesianCoordinatePoint;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian\CartesianCoordinateNotFound;

final class CartesianCoordinatePointTest extends TestCase
{
    private const ABSCISSA      = 1;
    private const ORDINATE      = 2;
    private const ABSCISSA_NAME = 'abscissa';
    private const ORDINATE_NAME = 'ordinate';

    private CartesianCoordinatePoint $cartesianCoordinatePoint;

    protected function setUp(): void
    {
        $this->cartesianCoordinatePoint = CartesianCoordinatePoint::create(
            self::ABSCISSA,
            self::ORDINATE
        );
    }

    public function testShouldCreateCartesianPoint(): void
    {
        $cartesianCoordinatePoint = CartesianCoordinatePoint::create(
            self::ABSCISSA,
            self::ORDINATE
        );

        self::assertInstanceOf(
            CartesianCoordinatePoint::class,
            $cartesianCoordinatePoint
        );

        self::assertInstanceOf(
            CartesianPoint::class,
            $cartesianCoordinatePoint
        );

        self::assertInstanceOf(
            Point::class,
            $cartesianCoordinatePoint
        );
    }

    public function testShouldReturnTheCoordinateNames(): void
    {
        self::assertSame(
            [
                self::ABSCISSA_NAME,
                self::ORDINATE_NAME
            ],
            $this->cartesianCoordinatePoint->coordinateNames()
        );
    }

    public function testShouldThrowAnExceptionWhenCoordinateNotFound(): void
    {
        self::expectException(CartesianCoordinateNotFound::class);

        $this->cartesianCoordinatePoint->coordinateValue('');
    }

    public function testShouldReturnTheAbscissaCoordinateValue(): void
    {
        self::assertSame(
            self::ABSCISSA,
            $this->abscissa($this->cartesianCoordinatePoint)
        );
    }

    public function testShouldReturnTheOrdinateCoordinateValue(): void
    {
        self::assertSame(
            self::ORDINATE,
            $this->cartesianCoordinatePoint->coordinateValue(self::ORDINATE_NAME)
        );
    }

    public function testShouldNotMoveAbscissaWhenMoveUp(): void
    {
        $movedCartesianPoint = $this->cartesianCoordinatePoint->moveUp();

        self::assertSame(
            $this->abscissa($movedCartesianPoint),
            $this->abscissa($this->cartesianCoordinatePoint)
        );
    }

    public function testShouldMoveOrdinateWhenMoveUp(): void
    {
        $movedCartesianPoint = $this->cartesianCoordinatePoint->moveUp();

        self::assertSame(
            $movedCartesianPoint->coordinateValue(self::ORDINATE_NAME),
            $this->cartesianCoordinatePoint->coordinateValue(self::ORDINATE_NAME) + 1
        );
    }

    private function abscissa(CartesianCoordinatePoint $cartesianCoordinatePoint): int
    {
        return $cartesianCoordinatePoint->coordinateValue(self::ABSCISSA_NAME);
    }
}
