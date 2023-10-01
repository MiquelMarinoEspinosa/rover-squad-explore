<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian\CartesianCoordinatePointData;

final class CartesianCoordinatePointDataTest extends TestCase
{
    public function testShouldCreateTheCartesianCoordinatePointData(): void
    {
        $cartesianCoordinatePointData = new CartesianCoordinatePointData();

        self::assertInstanceOf(
            CartesianCoordinatePointData::class,
            $cartesianCoordinatePointData
        );
    }
}
