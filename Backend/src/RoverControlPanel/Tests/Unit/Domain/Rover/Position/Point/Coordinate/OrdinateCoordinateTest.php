<?php

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point\Coordinate;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Coordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\OrdinateCoordinate;
use PHPUnit\Framework\TestCase;

final class OrdinateCoordinateTest extends TestCase
{
    public function testShouldCreateOrdinateCoordinate(): void
    {
        $oordinateCoordinate = new OrdinateCoordinate();

        self::assertInstanceOf(
            OrdinateCoordinate::class,
            $oordinateCoordinate
        );

        self::assertInstanceOf(
            Coordinate::class,
            $oordinateCoordinate
        );
    }
}
