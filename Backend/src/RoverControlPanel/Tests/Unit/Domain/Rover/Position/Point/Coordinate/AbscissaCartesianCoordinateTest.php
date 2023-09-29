<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point\Coordinate;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\AbscissaCartesianCoordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Coordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\NotAllowedMovement;
use PHPUnit\Framework\TestCase;

final class AbscissaCartesianCoordinateTest extends TestCase
{
    private const VALUE         = 0;
    private const MOVEMENT_STEP = 1;

    private AbscissaCartesianCoordinate $abscissaCartesianCoordinate;

    protected function setUp(): void
    {
        $this->abscissaCartesianCoordinate = $this->givenAbscissaCartesianCoordinate(
            self::VALUE
        );
    }

    public function testShouldCreateAbscissaCartesianCoordinate(): void
    {
        $abscissaCartesianCoordinate = $this->givenAbscissaCartesianCoordinate(
            self::VALUE
        );

        $this->thenShouldBeAbscissaCartesianCoordinate(
            $abscissaCartesianCoordinate
        );

        self::assertInstanceOf(
            Coordinate::class,
            $abscissaCartesianCoordinate
        );
    }

    public function testShouldThrowAnExceptionWhenMoveUp(): void
    {
        $this->shouldThrowAnException();

        $this->abscissaCartesianCoordinate->moveUp();
    }

    public function testShouldThrowAnExceptionWhenMoveDown(): void
    {
        $this->shouldThrowAnException();

        $this->abscissaCartesianCoordinate->moveDown();
    }

    public function testShouldMoveRight(): void
    {
        $movedAbscissaCartesianCoordinate = $this->abscissaCartesianCoordinate
            ->moveRight();

        $this->thenShouldBeAbscissaCartesianCoordinate(
            $movedAbscissaCartesianCoordinate
        );

        self::assertSame(
            $movedAbscissaCartesianCoordinate->value(),
            $this->abscissaCartesianCoordinate->value() + self::MOVEMENT_STEP
        );
    }

    public function testShouldMoveLeft(): void
    {
        $movedAbscissaCartesianCoordinate = $this->abscissaCartesianCoordinate
            ->moveLeft();

        $this->thenShouldBeAbscissaCartesianCoordinate(
            $movedAbscissaCartesianCoordinate
        );

        self::assertSame(
            $movedAbscissaCartesianCoordinate->value(),
            $this->abscissaCartesianCoordinate->value() - self::MOVEMENT_STEP
        );
    }

    private function givenAbscissaCartesianCoordinate(
        int $value
    ): AbscissaCartesianCoordinate {

        return new AbscissaCartesianCoordinate($value);
    }

    private function shouldThrowAnException(): void
    {
        self::expectException(NotAllowedMovement::class);
    }

    private function thenShouldBeAbscissaCartesianCoordinate(
        $abscissaCartesianCoordinate
    ): void {
        self::assertInstanceOf(
            AbscissaCartesianCoordinate::class,
            $abscissaCartesianCoordinate
        );
    }
}
