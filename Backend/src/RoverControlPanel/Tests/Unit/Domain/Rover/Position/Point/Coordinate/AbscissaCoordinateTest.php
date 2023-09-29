<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point\Coordinate;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\AbscissaCoordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Coordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\NotAllowedMovement;
use PHPUnit\Framework\TestCase;

final class AbscissaCoordinateTest extends TestCase
{
    private AbscissaCoordinate $abscissaCoordinate;

    protected function setUp(): void
    {
        $this->abscissaCoordinate = $this->givenAbscissaCoordinate();
    }

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
        $this->shouldThrowAnException();

        $this->abscissaCoordinate->moveUp();
    }

    public function testShouldThrowAnExceptionWhenMoveDown(): void
    {
        $this->shouldThrowAnException();

        $this->abscissaCoordinate->moveDown();
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
