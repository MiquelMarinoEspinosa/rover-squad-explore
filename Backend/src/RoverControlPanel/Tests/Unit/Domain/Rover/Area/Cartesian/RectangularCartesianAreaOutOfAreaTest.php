<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Area\Cartesian;

use Throwable;
use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Area\OutOfArea;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\RectangularCartesianArea;
use Core\RoverControlPanel\Domain\Rover\Point\Cartesian\CartesianCoordinatePoint;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\RectangularCartesianAreaOutOfArea;

final class RectangularCartesianAreaOutOfAreaTest extends TestCase
{
    private const UPPER_RIGHT_ABSCISSA = 5;
    private const UPPER_RIGHT_ORDINATE = 5;

    public function testShouldCreateRectangularCartesianAreaOutOfArea(): void
    {
        $rectangularCartesianArea = $this->givenRectangularCartesianArea();

        $cartesianCoordinatePoint = $this->givenCartestianCoordinatePoint();

        $this->thenShouldCreateTheRectangularCartesianAreaOutOfArea(
            $rectangularCartesianArea,
            $cartesianCoordinatePoint
        );
    }

    private function givenRectangularCartesianArea(): RectangularCartesianArea
    {
        return RectangularCartesianArea::createWithUpperRightCoordinates(
            self::UPPER_RIGHT_ABSCISSA,
            self::UPPER_RIGHT_ORDINATE
        );
    }

    private function givenCartestianCoordinatePoint(): CartesianCoordinatePoint
    {
        return CartesianCoordinatePoint::create(
            self::UPPER_RIGHT_ABSCISSA + 1,
            self::UPPER_RIGHT_ORDINATE + 1
        );
    }

    private function thenShouldCreateTheRectangularCartesianAreaOutOfArea(
        RectangularCartesianArea $rectangular,
        CartesianCoordinatePoint $cartesianCoordinatePoint
    ): void {
        $rectangularCartesianAreaOutOfArea = RectangularCartesianAreaOutOfArea::create(
            $rectangular,
            $cartesianCoordinatePoint
        );

        self::assertInstanceOf(
            RectangularCartesianAreaOutOfArea::class,
            $rectangularCartesianAreaOutOfArea
        );

        self::assertInstanceOf(
            OutOfArea::class,
            $rectangularCartesianAreaOutOfArea
        );

        self::assertInstanceOf(
            Throwable::class,
            $rectangularCartesianAreaOutOfArea
        );
    }
}
