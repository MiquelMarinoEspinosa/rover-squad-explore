<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point;

use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Point;
use Core\RoverControlPanel\Domain\Rover\Position\Point\CartesianPoint;
use Core\RoverControlPanel\Domain\Rover\Position\Point\CoordinatePointNotFound;

final class CartesianPointTest extends TestCase
{
    private const ABSCISSA      = 1;
    private const ORDINATE      = 2;
    private const ABSCISSA_NAME = 'abscissa';
    private const ORDINATE_NAME = 'ordinate';

    private CartesianPoint $cartesianPoint;

    protected function setUp(): void
    {
        $this->cartesianPoint = CartesianPoint::create(
            self::ABSCISSA,
            self::ORDINATE
        );
    }

    public function testShouldCreateCartesianPoint(): void
    {
        $cartesianPoint = CartesianPoint::create(
            self::ABSCISSA,
            self::ORDINATE
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
        self::expectException(CoordinatePointNotFound::class);

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
