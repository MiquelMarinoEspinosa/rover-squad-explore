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
    private const ABSCISSA_VALUE = 1;
    private const ORDINATE_VALUE = 2;
    private const ABSCISSA_NAME  = 'abscissa';
    private const ORDINATE_NAME  = 'ordinate';

    private CartesianCoordinatePoint $cartesianCoordinatePoint;

    protected function setUp(): void
    {
        $this->cartesianCoordinatePoint = CartesianCoordinatePoint::create(
            self::ABSCISSA_VALUE,
            self::ORDINATE_VALUE
        );
    }

    public function testShouldCreateCartesianPoint(): void
    {
        $cartesianCoordinatePoint = CartesianCoordinatePoint::create(
            self::ABSCISSA_VALUE,
            self::ORDINATE_VALUE
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
            self::ABSCISSA_VALUE,
            $this->abscissa($this->cartesianCoordinatePoint)
        );
    }

    public function testShouldReturnTheOrdinateCoordinateValue(): void
    {
        self::assertSame(
            self::ORDINATE_VALUE,
            $this->ordinate($this->cartesianCoordinatePoint)
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
            $this->ordinate($movedCartesianPoint),
            $this->ordinate($this->cartesianCoordinatePoint) + 1
        );
    }

    private function abscissa(CartesianCoordinatePoint $cartesianCoordinatePoint): int
    {
        return $cartesianCoordinatePoint->coordinateValue(self::ABSCISSA_NAME);
    }

    private function ordinate(CartesianCoordinatePoint $cartesianCoordinatePoint): int
    {
        return $cartesianCoordinatePoint->coordinateValue(self::ORDINATE_NAME);
    }
}
