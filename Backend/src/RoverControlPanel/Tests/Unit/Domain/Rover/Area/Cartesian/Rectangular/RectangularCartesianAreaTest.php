<?php

declare(strict_types=1);

namespace Core\Tests\Unit\Domain\Rover\Area\Rectangular;

use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Area\Area;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\CartesianArea;
use Core\RoverControlPanel\Domain\Rover\Point\Cartesian\CartesianCoordinatePoint;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianArea;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianAreaOutOfArea;

final class RectangularCartesianAreaTest extends TestCase
{
    private const LOWER_LEFT_ABSCISSA  = 0;
    private const LOWER_LEFT_ORDINATE  = self::LOWER_LEFT_ABSCISSA;
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

    public function testCheckPointShouldThrowAnExceptionWhenThePointAbscissaIsBeyondTheAreaUpperRight(): void
    {
        $this->thenCheckPointShouldThrowAnException(
            self::UPPER_RIGHT_ABSCISSA + 1,
            self::UPPER_RIGHT_ORDINATE
        );
    }

    public function testCheckPointShouldThrowAnExceptionWhenThePointOrdinateIsBeyondTheAreaUpperRight(): void
    {
        $this->thenCheckPointShouldThrowAnException(
            self::UPPER_RIGHT_ABSCISSA,
            self::UPPER_RIGHT_ORDINATE + 1
        );
    }

    public function testCheckPointShouldThrowAnExceptionWhenThePointAbscissaIsBeyondTheAreaLowerLeft(): void
    {
        $this->thenCheckPointShouldThrowAnException(
            self::LOWER_LEFT_ABSCISSA - 1,
            self::LOWER_LEFT_ORDINATE
        );
    }

    public function testCheckPointShouldThrowAnExceptionWhenThePointOrdinateIsBeyondTheAreaLowerLeft(): void
    {
        $this->thenCheckPointShouldThrowAnException(
            self::LOWER_LEFT_ABSCISSA,
            self::LOWER_LEFT_ORDINATE - 1
        );
    }

    private function thenCheckPointShouldThrowAnException(
        int $abscissa,
        int $ordinate
    ): void {
        $rectangularCartesianArea = $this->givenRectangularCartesianArea();

        self::expectException(RectangularCartesianAreaOutOfArea::class);

        $rectangularCartesianArea->checkPoint(
            CartesianCoordinatePoint::create(
                $abscissa,
                $ordinate
            )
        );
    }

    private function givenRectangularCartesianArea(): RectangularCartesianArea
    {
        return RectangularCartesianArea::createWithUpperRightCoordinates(
            self::UPPER_RIGHT_ABSCISSA,
            self::UPPER_RIGHT_ORDINATE
        );
    }
}
