<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Position\Point\PointData;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian\CartesianPointData;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian\CartesianCoordinatePointData;

final class CartesianCoordinatePointDataTest extends TestCase
{
    private const ABSCISSA = 0;
    private const ORDINATE = 1;
    
    public function testShouldCreateTheCartesianCoordinatePointData(): void
    {
        $cartesianCoordinatePointData = new CartesianCoordinatePointData(
            self::ABSCISSA,
            self::ORDINATE
        );

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

    public function testShouldReturnTheOrdinate(): void
    {
        $cartesianCoordinatePointData = new CartesianCoordinatePointData(
            0,
            1
        );

        self::assertSame(
            1,
            $cartesianCoordinatePointData->ordinate()
        );
    }
}
