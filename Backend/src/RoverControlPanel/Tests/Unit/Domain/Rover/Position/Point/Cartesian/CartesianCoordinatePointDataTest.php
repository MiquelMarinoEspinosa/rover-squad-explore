<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Position\Point\PointData;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian\CartesianPointData;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian\CartesianCoordinatePointData;

final class CartesianCoordinatePointDataTest extends TestCase
{
    public function testShouldCreateTheCartesianCoordinatePointData(): void
    {
        $cartesianCoordinatePointData = new CartesianCoordinatePointData(0);

        self::assertInstanceOf(
            CartesianCoordinatePointData::class,
            $cartesianCoordinatePointData
        );

        self::assertInstanceOf(
            CartesianPointData::class,
            $cartesianCoordinatePointData
        );

        self::assertInstanceOf(
            PointData::class,
            $cartesianCoordinatePointData
        );
    }

    public function testShouldReturnTheAbscissa(): void
    {
        $cartesianCoordinatePointData = new CartesianCoordinatePointData(
            0,
            1
        );

        self::assertSame(
            0,
            $cartesianCoordinatePointData->abscissa()
        );
    }
}
