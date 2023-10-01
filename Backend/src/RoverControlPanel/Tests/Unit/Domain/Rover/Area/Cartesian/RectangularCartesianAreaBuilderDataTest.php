<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Area\Cartesian;

use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\CartesianAreaBuilderData;
use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\RectangularCartesianAreaBuilderData;

final class RectangularCartesianAreaBuilderDataTest extends TestCase
{
    public function testShouldCreateTheRectangularCartesianAreaBuilderData(): void
    {
        $rectangularCartesianAreaBuilderData = new RectangularCartesianAreaBuilderData();

        self::assertInstanceOf(
            RectangularCartesianAreaBuilderData::class,
            $rectangularCartesianAreaBuilderData
        );

        self::assertInstanceOf(
            CartesianAreaBuilderData::class,
            $rectangularCartesianAreaBuilderData
        );
    }

    public function testShouldReturnTheUpperRightAbscissa(): void
    {
        $rectangularCartesianAreaBuilderData = new RectangularCartesianAreaBuilderData(
            0
        );

        self::assertSame(
            0,
            $rectangularCartesianAreaBuilderData->upperRightAbscissa()
        );
    }
}
