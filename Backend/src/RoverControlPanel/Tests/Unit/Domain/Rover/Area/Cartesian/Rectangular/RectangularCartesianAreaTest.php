<?php

declare(strict_types=1);

namespace Core\Tests\Unit\Domain\Rover\Area\Rectangular;

use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Area\Area;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\CartesianArea;
use Core\RoverControlPanel\Domain\Rover\Point\Cartesian\CartesianCoordinatePoint;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianArea;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianAreaOutOfArea;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianInvalidArea;

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

    public function testShouldThrowAnExceptionWhenCreateWithUpperRightInvalidAbscissa(): void
    {
        self::expectException(
            RectangularCartesianInvalidArea::class
        );

        RectangularCartesianArea::createWithUpperRightCoordinates(
            self::LOWER_LEFT_ABSCISSA - 1,
            self::UPPER_RIGHT_ORDINATE
        );
    }

    public function testShouldThrowAnExceptionWhenCreateWithUpperRightInvalidOrdinate(): void
    {
        self::expectException(
            RectangularCartesianInvalidArea::class
        );

        RectangularCartesianArea::createWithUpperRightCoordinates(
            self::UPPER_RIGHT_ABSCISSA,
            self::LOWER_LEFT_ORDINATE - 1
        );
    }

    public function testValidatePointShouldConsiderThePointValid(): void
    {
        $rectangularCartesianArea = $this->givenRectangularCartesianArea();

        $rectangularCartesianArea->validatePoint(
            CartesianCoordinatePoint::create(
                self::UPPER_RIGHT_ABSCISSA,
                self::UPPER_RIGHT_ORDINATE
            )
        );

        self::assertTrue(true);
    }

    public function testValidatePointShouldThrowAnExceptionWhenThePointAbscissaIsBeyondTheAreaUpperRight(): void
    {
        $this->thenValidatePointShouldThrowAnException(
            self::UPPER_RIGHT_ABSCISSA + 1,
            self::UPPER_RIGHT_ORDINATE
        );
    }

    public function testValidatePointShouldThrowAnExceptionWhenThePointOrdinateIsBeyondTheAreaUpperRight(): void
    {
        $this->thenValidatePointShouldThrowAnException(
            self::UPPER_RIGHT_ABSCISSA,
            self::UPPER_RIGHT_ORDINATE + 1
        );
    }

    public function testValiadtePointShouldThrowAnExceptionWhenThePointAbscissaIsBeyondTheAreaLowerLeft(): void
    {
        $this->thenValidatePointShouldThrowAnException(
            self::LOWER_LEFT_ABSCISSA - 1,
            self::LOWER_LEFT_ORDINATE
        );
    }

    public function testValidatePointShouldThrowAnExceptionWhenThePointOrdinateIsBeyondTheAreaLowerLeft(): void
    {
        $this->thenValidatePointShouldThrowAnException(
            self::LOWER_LEFT_ABSCISSA,
            self::LOWER_LEFT_ORDINATE - 1
        );
    }

    private function thenValidatePointShouldThrowAnException(
        int $abscissa,
        int $ordinate
    ): void {
        $rectangularCartesianArea = $this->givenRectangularCartesianArea();

        self::expectException(RectangularCartesianAreaOutOfArea::class);

        $rectangularCartesianArea->validatePoint(
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
