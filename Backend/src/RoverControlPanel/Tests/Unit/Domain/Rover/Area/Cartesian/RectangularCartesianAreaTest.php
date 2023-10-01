<?php

declare(strict_types=1);

namespace Core\Tests\Unit\Domain\Rover\Area;

use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Area\Area;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\CartesianArea;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\RectangularCartesianArea;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\RectangularCartesianAreaOutOfArea;
use Core\RoverControlPanel\Domain\Rover\Point\Cartesian\CartesianCoordinatePoint;

final class RectangularCartesianAreaTest extends TestCase
{
    private const UPPER_RIGHT_ABSCISSA = 5;
    private const UPPER_RIGHT_ORDINATE = self::UPPER_RIGHT_ABSCISSA;

    public function testShouldCreateTheRectangularCartesianArea(): void
    {
        $rectangularCartesianArea = RectangularCartesianArea::createWithUpperRightCoordinates(
            self::UPPER_RIGHT_ABSCISSA,
            self::UPPER_RIGHT_ORDINATE
        );

        self::assertInstanceOf(
            RectangularCartesianArea::class,
            $rectangularCartesianArea
        );

        self::assertInstanceOf(
            CartesianArea::class,
            $rectangularCartesianArea
        );

        self::assertInstanceOf(
            Area::class,
            $rectangularCartesianArea
        );
    }

    public function testCheckPointShouldThrowAnExceptionWhenThePointAbscissaIsBeyondTheAreaUpperRight(): void
    {
        $rectangularCartesianArea = $this->givenRectangularCartesianArea();

        self::expectException(RectangularCartesianAreaOutOfArea::class);

        $rectangularCartesianArea->checkPoint(
            CartesianCoordinatePoint::create(
                self::UPPER_RIGHT_ABSCISSA + 1,
                self::UPPER_RIGHT_ORDINATE
            )
        );
    }

    public function testCheckPointShouldThrowAnExceptionWhenThePointOrdinateIsBeyondTheAreaUpperRight(): void
    {
        $rectangularCartesianArea = $this->givenRectangularCartesianArea();

        self::expectException(RectangularCartesianAreaOutOfArea::class);

        $rectangularCartesianArea->checkPoint(
            CartesianCoordinatePoint::create(
                self::UPPER_RIGHT_ABSCISSA,
                self::UPPER_RIGHT_ORDINATE + 1
            )
        );
    }

    public function testCheckPointShouldConsiderThePointValid(): void
    {
        $rectangularCartesianArea = $this->givenRectangularCartesianArea();

        $rectangularCartesianArea->checkPoint(
            CartesianCoordinatePoint::create(
                self::UPPER_RIGHT_ABSCISSA,
                self::UPPER_RIGHT_ORDINATE
            )
        );

        self::assertTrue(true);
    }

    private function givenRectangularCartesianArea(): RectangularCartesianArea
    {
        return RectangularCartesianArea::createWithUpperRightCoordinates(
            self::UPPER_RIGHT_ABSCISSA,
            self::UPPER_RIGHT_ORDINATE
        );
    }
}
