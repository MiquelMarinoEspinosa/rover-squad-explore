<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point;

use Core\RoverControlPanel\Domain\Rover\Position\Point\CartesianPoint;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Point;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertSame;

final class CartesianPointTest extends TestCase
{
    private const ABSCISSA = 1;
    private const ORDINATE = 2;

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
        $cartesianPoint = CartesianPoint::create(
            self::ABSCISSA,
            self::ORDINATE
        );

        self::assertSame(
            [
                self::ABSCISSA,
                self::ORDINATE
            ],
            $cartesianPoint->value()
        );
    }

    public function testShouldNotMoveAbscissaWhenMoveUp(): void
    {
        $cartesianPoint = CartesianPoint::create(
            self::ABSCISSA,
            self::ORDINATE
        );

        $movedCartesianPoint = $cartesianPoint->moveUp();

        assertSame(
            $movedCartesianPoint->horizontal(),
            $cartesianPoint->horizontal()
        );
    }

    public function testShouldMoveOrdinateWhenMoveUp(): void
    {
        $cartesianPoint = CartesianPoint::create(
            self::ABSCISSA,
            self::ORDINATE
        );

        $movedCartesianPoint = $cartesianPoint->moveUp();

        assertSame(
            $movedCartesianPoint->coordinate('ordinate'),
            $cartesianPoint->coordinate('ordinate') + 1
        );
    }
}
