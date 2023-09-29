<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point\Coordinate;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\AbscissaCoordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Coordinate;
use PHPUnit\Framework\TestCase;

final class AbscissaCoordinateTest extends TestCase
{
    public function testShouldCreateAbscissaCoordinate(): void
    {
        $abscissaCoordinate = new AbscissaCoordinate();

        self::assertInstanceOf(AbscissaCoordinate::class, $abscissaCoordinate);
        self::assertInstanceOf(Coordinate::class, $abscissaCoordinate);
    }

    public function testShouldThrowAnExceptionWhenMoveUp(): void
    {
        $abscissaCoordinate = new AbscissaCoordinate();

        self::expectException(\Exception::class);

        $abscissaCoordinate->moveUp();
    }
}
