<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point\Coordinate\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Coordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Cartesian\CartesianCoordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Cartesian\AbscissaCartesianCoordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Cartesian\CartesianCoordinateNotAllowedMovement;

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
            CartesianCoordinate::class,
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

    public function testShouldNotBeGreaterThanWhenValueIsEqual(): void
    {
        $this->thenShouldNotBeGreaterThan(self::VALUE);
    }

    public function testShouldNotBeGreaterThanWhenValueIsLess(): void
    {
        $this->thenShouldNotBeGreaterThan(self::VALUE - 1);
    }

    public function testShouldBeGreatherThan(): void
    {
        $abscissaGreaterThan = $this->givenAbscissaCartesianCoordinate(
            self::VALUE + 1
        );

        self::assertTrue($abscissaGreaterThan->greaterThan(
            $this->abscissaCartesianCoordinate
        ));
    }

    public function testShouldNotBeLesserThanWhenValueIsEqual(): void
    {
        $abscissaNotLesserThan = $this->givenAbscissaCartesianCoordinate(
            self::VALUE
        );

        self::assertFalse($abscissaNotLesserThan->lesserThan(
            $this->abscissaCartesianCoordinate
        ));
    }

    public function testShouldNotBeLesserThanWhenValueIsGreater(): void
    {
        $abscissaNotLesserThan = $this->givenAbscissaCartesianCoordinate(
            self::VALUE + 1
        );

        self::assertFalse($abscissaNotLesserThan->lesserThan(
            $this->abscissaCartesianCoordinate
        ));
    }

    public function testShouldReturnTheValue(): void
    {
        self::assertSame(
            self::VALUE,
            $this->abscissaCartesianCoordinate->value()
        );
    }

    private function givenAbscissaCartesianCoordinate(
        int $value
    ): AbscissaCartesianCoordinate {

        return new AbscissaCartesianCoordinate($value);
    }

    private function shouldThrowAnException(): void
    {
        self::expectException(
            CartesianCoordinateNotAllowedMovement::class
        );
    }

    private function thenShouldBeAbscissaCartesianCoordinate(
        $abscissaCartesianCoordinate
    ): void {
        self::assertInstanceOf(
            AbscissaCartesianCoordinate::class,
            $abscissaCartesianCoordinate
        );
    }

    private function thenShouldNotBeGreaterThan(int $value): void
    {
        $bscissaNotGreaterThan = $this->givenAbscissaCartesianCoordinate(
            $value
        );

        self::assertFalse($bscissaNotGreaterThan->greaterThan(
            $this->abscissaCartesianCoordinate
        ));
    }
}
