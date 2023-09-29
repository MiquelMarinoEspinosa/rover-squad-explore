<?php

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point\Coordinate;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\AbscissaCoordinate;
use PHPUnit\Framework\TestCase;

final class AbscissaCoordinateTest extends TestCase
{
    public function testShouldCreateAbscissaCoordinate(): void
    {
        $abscissaCoordinate = new AbscissaCoordinate(0);

        self::assertInstanceOf(AbscissaCoordinate::class, $abscissaCoordinate);
    }    
}