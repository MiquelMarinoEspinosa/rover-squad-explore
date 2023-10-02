<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Area\Cartesian\Rectangular;

use Throwable;
use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Area\OutOfArea;
use Core\Rover\Domain\Rover\Point\Cartesian\CartesianCoordinatePoint;
use Core\Rover\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianAreaOutOfArea;

final class RectangularCartesianAreaOutOfAreaTest extends TestCase
{
    private const LOWER_LEFT_ABSCISSA  = 0;
    private const LOWER_LEFT_ORDINATE  = self::LOWER_LEFT_ABSCISSA;
    private const UPPER_RIGHT_ABSCISSA = 5;
    private const UPPER_RIGHT_ORDINATE = self::UPPER_RIGHT_ABSCISSA;

    public function testShouldCreateRectangularCartesianAreaOutOfArea(): void
    {
        $lowerLeftCoordinatePoint = $this->givenLowerLeftCoordinatePoint();

        $upperRightCoordinatePoint = $this->givenUpperRightCoordinatePoint();

        $cartesianCoordinatePoint = $this->givenCartestianCoordinatePoint();

        $this->thenShouldCreateTheRectangularCartesianAreaOutOfArea(
            $lowerLeftCoordinatePoint,
            $upperRightCoordinatePoint,
            $cartesianCoordinatePoint
        );
    }

    private function givenLowerLeftCoordinatePoint(): CartesianCoordinatePoint
    {
        return CartesianCoordinatePoint::create(
            self::LOWER_LEFT_ABSCISSA,
            self::LOWER_LEFT_ORDINATE
        );
    }

    private function givenUpperRightCoordinatePoint(): CartesianCoordinatePoint
    {
        return CartesianCoordinatePoint::create(
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
        CartesianCoordinatePoint $lowerLeftCoordinatePoint,
        CartesianCoordinatePoint $upperRightCoordinatePoint,
        CartesianCoordinatePoint $cartesianCoordinatePoint
    ): void {
        $rectangularCartesianAreaOutOfArea = RectangularCartesianAreaOutOfArea::create(
            $lowerLeftCoordinatePoint,
            $upperRightCoordinatePoint,
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
