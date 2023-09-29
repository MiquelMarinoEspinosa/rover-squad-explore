<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point\Coordinate;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\AbscissaCoordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Coordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\NotAllowedMovement;
use PHPUnit\Framework\TestCase;

final class AbscissaCoordinateTest extends TestCase
{
    public function testShouldCreateAbscissaCoordinate(): void
    {
        $abscissaCoordinate = $this->givenAbscissaCoordinate();

        self::assertInstanceOf(
            AbscissaCoordinate::class,
            $abscissaCoordinate
        );

        self::assertInstanceOf(
            Coordinate::class,
            $abscissaCoordinate
        );
    }

    public function testShouldThrowAnExceptionWhenMoveUp(): void
    {
        $abscissaCoordinate = $this->givenAbscissaCoordinate();

        $this->shouldThrowAnException();

        $abscissaCoordinate->moveUp();
    }

    public function testShouldThrowAnExceptionWhenMoveDown(): void
    {
        $abscissaCoordinate = $this->givenAbscissaCoordinate();

        $this->shouldThrowAnException();

        $abscissaCoordinate->moveDown();
    }

    private function givenAbscissaCoordinate(): AbscissaCoordinate
    {
        return new AbscissaCoordinate();
    }

    private function shouldThrowAnException(): void
    {
        self::expectException(NotAllowedMovement::class);
    }
}
