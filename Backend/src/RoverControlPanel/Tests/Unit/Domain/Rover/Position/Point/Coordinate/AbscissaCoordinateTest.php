<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point\Coordinate;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\AbscissaCoordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Coordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\NotAllowedMovement;
use PHPUnit\Framework\TestCase;

final class AbscissaCoordinateTest extends TestCase
{
    private const VALUE = 0;

    private AbscissaCoordinate $abscissaCoordinate;

    protected function setUp(): void
    {
        $this->abscissaCoordinate = $this->givenAbscissaCoordinate(self::VALUE);
    }

    public function testShouldCreateAbscissaCoordinate(): void
    {
        $abscissaCoordinate = $this->givenAbscissaCoordinate(self::VALUE);

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

    public function testShouldMoveRight(): void
    {
        $movedAbscissaCoordinate = $this->abscissaCoordinate->moveRight();

        self::assertSame(
            $movedAbscissaCoordinate->value(),
            $this->abscissaCoordinate->value() + 1
        );
    }

    public function testShouldMoveLeft(): void
    {
        $movedAbscissaCoordinate = $this->abscissaCoordinate->moveLeft();

        self::assertSame(
            $movedAbscissaCoordinate->value(),
            $this->abscissaCoordinate->value() - 1
        );
    }

    private function givenAbscissaCoordinate(int $value): AbscissaCoordinate
    {
        return new AbscissaCoordinate($value);
    }

    private function shouldThrowAnException(): void
    {
        self::expectException(NotAllowedMovement::class);
    }
}
