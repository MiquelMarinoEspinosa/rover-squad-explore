<?php

declare(strict_types=1);

namespace Core\Tests\Unit\Domain\Rover\Position\Point\Area;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Area\Area;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Area\RectangularArea;
use PHPUnit\Framework\TestCase;

final class RectangularAreaTest extends TestCase
{
    private const LOWER_LEFT_ABSCISSA = 0;
    private const LOWER_LEFT_ORDINATE = self::LOWER_LEFT_ABSCISSA;
    private const UPER_RIGHT_ABSCISSA = 5;
    private const UPER_RIGHT_ORDINATE = self::LOWER_LEFT_ABSCISSA;

    public function testShouldCreateTheArea(): void
    {
        $rectangularArea = $this->givenRectangularArea();

        self::assertInstanceOf(RectangularArea::class, $rectangularArea);
        self::assertInstanceOf(Area::class, $rectangularArea);
    }

    public function testShouldThrowAnExceptionWhenThePointIsBeyondTheAreaLeft(): void
    {
        $rectangularArea = $this->givenRectangularArea();

        self::expectException(\Exception::class);

        $rectangularArea->checkPoint(
            self::LOWER_LEFT_ABSCISSA + 1,
            self::LOWER_LEFT_ORDINATE
        );
    }

    private function givenRectangularArea(): RectangularArea
    {
        return RectangularArea::create(
            self::LOWER_LEFT_ABSCISSA,
            self::LOWER_LEFT_ORDINATE,
            self::UPER_RIGHT_ABSCISSA,
            self::UPER_RIGHT_ORDINATE
        );
    }
}
