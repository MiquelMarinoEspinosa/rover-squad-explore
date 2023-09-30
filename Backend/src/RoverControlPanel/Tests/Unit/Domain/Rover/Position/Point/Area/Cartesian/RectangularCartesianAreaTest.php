<?php

declare(strict_types=1);

namespace Core\Tests\Unit\Domain\Rover\Position\Point\Area;

use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Area\Area;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Area\Cartesian\CartesianArea;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Area\Cartesian\RectangularCartesianArea;

final class RectangularCartesianAreaTest extends TestCase
{
    private const LOWER_LEFT_ABSCISSA = 0;
    private const LOWER_LEFT_ORDINATE = self::LOWER_LEFT_ABSCISSA;
    private const UPER_RIGHT_ABSCISSA = 5;
    private const UPER_RIGHT_ORDINATE = self::LOWER_LEFT_ABSCISSA;

    public function testShouldCreateTheRectangularCartesianArea(): void
    {
        $rectangularCartesianArea = $this->givenRectangularCartesianArea();

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

    public function testCheckPointShouldThrowAnExceptionWhenThePointIsBeyondTheAreaRight(): void
    {
        $rectangularCartesianArea = $this->givenRectangularCartesianArea();

        self::expectException(\Exception::class);

        $rectangularCartesianArea->checkPoint(
            self::LOWER_LEFT_ABSCISSA - 1,
            self::LOWER_LEFT_ORDINATE
        );
    }

    public function testCheckPointShouldConsiderThePointValid(): void
    {
        $rectangularCartesianArea = $this->givenRectangularCartesianArea();

        $rectangularCartesianArea->checkPoint(
            self::LOWER_LEFT_ABSCISSA + 1,
            self::LOWER_LEFT_ORDINATE
        );

        self::assertTrue(true);
    }

    private function givenRectangularCartesianArea(): RectangularCartesianArea
    {
        return RectangularCartesianArea::create(
            self::LOWER_LEFT_ABSCISSA,
            self::LOWER_LEFT_ORDINATE,
            self::UPER_RIGHT_ABSCISSA,
            self::UPER_RIGHT_ORDINATE
        );
    }
}
