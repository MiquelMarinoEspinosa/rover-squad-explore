<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Area\Cartesian\Rectangular;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Area\Cartesian\CartesianAreaBuilderData;
use Core\Rover\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianAreaBuilderData;

final class RectangularCartesianAreaBuilderDataTest extends TestCase
{
    private const UPPER_RIGHT_ABSCISSA = 5;
    private const UPPER_RIGHT_ORDINATE = self::UPPER_RIGHT_ABSCISSA;

    public function testShouldCreateTheRectangularCartesianAreaBuilderData(): void
    {
        $rectangularCartesianAreaBuilderData = new RectangularCartesianAreaBuilderData(
            self::UPPER_RIGHT_ABSCISSA,
            self::UPPER_RIGHT_ORDINATE
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
            self::UPPER_RIGHT_ABSCISSA,
            self::UPPER_RIGHT_ORDINATE
        );

        self::assertSame(
            self::UPPER_RIGHT_ABSCISSA,
            $rectangularCartesianAreaBuilderData->upperRightAbscissa()
        );
    }

    public function testShouldReturnTheUpperRightOrdinate(): void
    {
        $rectangularCartesianAreaBuilderData = new RectangularCartesianAreaBuilderData(
            self::UPPER_RIGHT_ABSCISSA,
            self::UPPER_RIGHT_ORDINATE
        );

        self::assertSame(
            self::UPPER_RIGHT_ORDINATE,
            $rectangularCartesianAreaBuilderData->upperRightOrdinate()
        );
    }
}
