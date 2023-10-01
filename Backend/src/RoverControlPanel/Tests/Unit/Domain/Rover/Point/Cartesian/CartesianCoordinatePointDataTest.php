<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Point\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Point\PointData;
use Core\RoverControlPanel\Domain\Rover\Point\Cartesian\CartesianPointData;
use Core\RoverControlPanel\Domain\Rover\Point\Cartesian\CartesianCoordinatePointData;

final class CartesianCoordinatePointDataTest extends TestCase
{
    private const ABSCISSA = 0;
    private const ORDINATE = 1;

    private CartesianCoordinatePointData $cartesianCoordinatePointData;

    protected function setUp(): void
    {
        $this->cartesianCoordinatePointData = new CartesianCoordinatePointData(
            self::ABSCISSA,
            self::ORDINATE
        );
    }

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
        self::assertSame(
            self::ABSCISSA,
            $this->cartesianCoordinatePointData->abscissa()
        );
    }

    public function testShouldReturnTheOrdinate(): void
    {
        self::assertSame(
            self::ORDINATE,
            $this->cartesianCoordinatePointData->ordinate()
        );
    }
}
