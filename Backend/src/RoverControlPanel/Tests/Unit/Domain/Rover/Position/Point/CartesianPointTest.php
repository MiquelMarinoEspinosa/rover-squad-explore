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

    public function testShouldReturnTheValue(): void
    {
        self::assertSame(
            [
                self::ABSCISSA_VALUE_INDEX => self::ABSCISSA,
                self::ORDINATE_VALUE_INDEX => self::ORDINATE
            ],
            $this->cartesianPoint->value()
        );
    }

    public function testShouldNotMoveAbscissaWhenMoveUp(): void
    {
        $movedCartesianPoint = $this->cartesianPoint->moveUp();

        self::assertSame(
            $movedCartesianPoint->value()[self::ABSCISSA_VALUE_INDEX],
            $this->cartesianPoint->value()[self::ABSCISSA_VALUE_INDEX]
        );
    }

    public function testShouldMoveOrdinateWhenMoveUp(): void
    {
        $movedCartesianPoint = $this->cartesianPoint->moveUp();

        self::assertSame(
            $movedCartesianPoint->value()[self::ORDINATE_VALUE_INDEX],
            $this->cartesianPoint->value()[self::ORDINATE_VALUE_INDEX] + 1
        );
    }
}
