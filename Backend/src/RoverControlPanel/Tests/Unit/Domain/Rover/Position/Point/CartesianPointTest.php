<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point;

use Core\RoverControlPanel\Domain\Rover\Position\Point\CartesianPoint;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Point;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertSame;

final class CartesianPointTest extends TestCase
{
    public function testShouldCreateCartesianPoint(): void
    {
        $cartesianPoint = CartesianPoint::create(
            0,
            0
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

    public function testShouldNotMoveAbscissaWhenMoveUp(): void
    {
        $cartesianPoint = CartesianPoint::create(
            0,
            0
        );

        $movedCartesianPoint = $cartesianPoint->moveUp();

        assertSame(
            $movedCartesianPoint->coordinate('abscissa'),
            $cartesianPoint->coordinate('abscissa')
        );
    }

    public function testShouldMoveOrdinateWhenMoveUp(): void
    {
        $cartesianPoint = CartesianPoint::create(
            0,
            0
        );

        $movedCartesianPoint = $cartesianPoint->moveUp();

        assertSame(
            $movedCartesianPoint->coordinate('ordinate'),
            $cartesianPoint->coordinate('ordinate') + 1
        );
    }
}
