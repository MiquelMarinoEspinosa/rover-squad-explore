<?php

namespace Core\Rover\Tests\Unit\Domain\Rover\Point\Coordinate;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Point\Coordinate\Coordinate;
use Core\Rover\Domain\Rover\Point\Coordinate\Cartesian\CartesianCoordinate;
use Core\Rover\Domain\Rover\Point\Coordinate\Cartesian\OrdinateCartesianCoordinate;
use Core\Rover\Domain\Rover\Point\Coordinate\Cartesian\CartesianCoordinateNotAllowedMovement;

final class OrdinateCartesianCoordinateTest extends TestCase
{
    private const VALUE         = 0;
    private const MOVEMENT_STEP = 1;

    private OrdinateCartesianCoordinate $ordinateCartesianCoordinate;

    protected function setUp(): void
    {
        $this->ordinateCartesianCoordinate = $this->givenOrdinateCartesianCoordinate(self::VALUE);
    }

    public function testShouldCreateOrdinateCartesianCoordinate(): void
    {
        $ordinateCartesianCoordinate = $this->givenOrdinateCartesianCoordinate(self::VALUE);

        $this->thenShouldBeOrdinateCartesianCoordinate(
            $ordinateCartesianCoordinate
        );

        self::assertInstanceOf(
            CartesianCoordinate::class,
            $ordinateCartesianCoordinate
        );

        self::assertInstanceOf(
            Coordinate::class,
            $ordinateCartesianCoordinate
        );
    }

    public function testShouldThrowAnExceptionWhenMoveRight(): void
    {
        $this->shouldThrowAnException();

        $this->ordinateCartesianCoordinate->moveRight();
    }

    public function testShouldThrowAnExceptionWhenMoveLeft(): void
    {
        $this->shouldThrowAnException();

        $this->ordinateCartesianCoordinate->moveLeft();
    }

    public function testShouldMoveUp(): void
    {
        $movedOrdinateCartesianCoordinate = $this->ordinateCartesianCoordinate
            ->moveUp();

        $this->thenShouldBeOrdinateCartesianCoordinate(
            $movedOrdinateCartesianCoordinate
        );

        self::assertSame(
            $movedOrdinateCartesianCoordinate->value(),
            $this->ordinateCartesianCoordinate->value() + self::MOVEMENT_STEP
        );
    }

    public function testShouldMoveDown(): void
    {
        $movedOrdinateCartesianCoordinate = $this->ordinateCartesianCoordinate
            ->moveDown();

        $this->thenShouldBeOrdinateCartesianCoordinate(
            $movedOrdinateCartesianCoordinate
        );

        self::assertSame(
            $movedOrdinateCartesianCoordinate->value(),
            $this->ordinateCartesianCoordinate->value() - self::MOVEMENT_STEP
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
        $ordinateGreaterThan = $this->givenOrdinateCartesianCoordinate(
            self::VALUE + 1
        );

        self::assertTrue($ordinateGreaterThan->isGreaterThan(
            $this->ordinateCartesianCoordinate
        ));
    }

    public function testShouldNotBeLesserThanWhenValueIsEqual(): void
    {
        $this->thenShouldNotBeLesserThan(self::VALUE);
    }

    public function testShouldNotBeLesserThanWhenValueIsGreater(): void
    {
        $this->thenShouldNotBeLesserThan(self::VALUE + 1);
    }

    public function testShouldBeLesserThan(): void
    {
        $ordinateLesserThan = $this->givenOrdinateCartesianCoordinate(
            self::VALUE - 1
        );

        self::assertTrue($ordinateLesserThan->isLesserThan(
            $this->ordinateCartesianCoordinate
        ));
    }

    public function testShouldReturnTheValue(): void
    {
        self::assertSame(
            self::VALUE,
            $this->ordinateCartesianCoordinate->value()
        );
    }

    private function shouldThrowAnException(): void
    {
        self::expectException(
            CartesianCoordinateNotAllowedMovement::class
        );
    }

    private function thenShouldBeOrdinateCartesianCoordinate(
        $ordinateCartesianCoordinate
    ): void {
        self::assertInstanceOf(
            OrdinateCartesianCoordinate::class,
            $ordinateCartesianCoordinate
        );
    }

    private function thenShouldNotBeGreaterThan(int $value): void
    {
        $ordinateGreaterThan = $this->givenOrdinateCartesianCoordinate(
            $value - 1
        );

        self::assertFalse($ordinateGreaterThan->isGreaterThan(
            $this->ordinateCartesianCoordinate
        ));
    }

    private function thenShouldNotBeLesserThan(int $value): void
    {
        $ordinateNotLesserThan = $this->givenOrdinateCartesianCoordinate(
            $value
        );

        self::assertFalse($ordinateNotLesserThan->isLesserThan(
            $this->ordinateCartesianCoordinate
        ));
    }

    private function givenOrdinateCartesianCoordinate(
        int $value
    ): OrdinateCartesianCoordinate {

        return new OrdinateCartesianCoordinate($value);
    }
}
