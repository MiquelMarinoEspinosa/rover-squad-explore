<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Area\Cartesian;

use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\CartesianAreaBuilderData;
use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\RectangularCartesianAreaBuilderData;

final class RectangularCartesianAreaBuilderDataTest extends TestCase
{
    private const UPPER_RIGHT_ABSCISSA = 5;
     
    public function testShouldCreateTheRectangularCartesianAreaBuilderData(): void
    {
        $rectangularCartesianAreaBuilderData = new RectangularCartesianAreaBuilderData(
            self::UPPER_RIGHT_ABSCISSA
        );

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
            self::UPPER_RIGHT_ABSCISSA
        );

        self::assertSame(
            self::UPPER_RIGHT_ABSCISSA,
            $rectangularCartesianAreaBuilderData->upperRightAbscissa()
        );
    }
}
