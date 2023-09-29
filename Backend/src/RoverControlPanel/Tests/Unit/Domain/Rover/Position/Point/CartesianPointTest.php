<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point;

use Core\RoverControlPanel\Domain\Rover\Position\Point\CartesianPoint;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Point;
use PHPUnit\Framework\TestCase;

final class CartesianPointTest extends TestCase
{
    private const ABSCISSA             = 1;
    private const ORDINATE             = 2;
    private const ABSCISSA_VALUE_INDEX = 0;
    private const ORDINATE_VALUE_INDEX = 1;

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
                'abscissa',
                'ordinate'
            ],
            $this->cartesianPoint->coordinateNames()
        );
    }

    public function testShouldReturnTheAbscissaCoordinateValue(): void
    {
        self::assertSame(
            self::ABSCISSA,
            $this->cartesianPoint->coordinateValue('abscissa')
        );
    }

    public function testShouldNotMoveAbscissaWhenMoveUp(): void
    {
        $movedCartesianPoint = $this->cartesianPoint->moveUp();

        self::assertSame(
            $movedCartesianPoint->coordinateValue('abscissa'),
            $this->cartesianPoint->coordinateValue('abscissa')
        );
    }

    public function testShouldMoveOrdinateWhenMoveUp(): void
    {
        $movedCartesianPoint = $this->cartesianPoint->moveUp();

        self::assertSame(
            $movedCartesianPoint->coordinateValue('ordinate'),
            $this->cartesianPoint->coordinateValue('ordinate') + 1
        );
    }
}
