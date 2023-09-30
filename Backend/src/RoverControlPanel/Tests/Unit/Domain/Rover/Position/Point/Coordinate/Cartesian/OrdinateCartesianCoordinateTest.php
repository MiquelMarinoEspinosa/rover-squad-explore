<?php

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point\Coordinate;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Cartesian\CartesianCoordinateNotAllowedMovement;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Cartesian\CartesinaCoordinateNotAllowedMovement;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Cartesian\OrdinateCartesianCoordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Coordinate;
use PHPUnit\Framework\TestCase;

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
        $oordinateCartesianCoordinate = $this->givenOrdinateCartesianCoordinate(self::VALUE);

        $this->thenShouldBeOrdinateCartesianCoordinate(
            $oordinateCartesianCoordinate
        );

        self::assertInstanceOf(
            Coordinate::class,
            $oordinateCartesianCoordinate
        );
    }

    public function testShouldReturnTheValue(): void
    {
        self::assertSame(
            self::VALUE,
            $this->ordinateCartesianCoordinate->value()
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

    private function givenOrdinateCartesianCoordinate(
        int $value
    ): OrdinateCartesianCoordinate {

        return new OrdinateCartesianCoordinate($value);
    }

    private function shouldThrowAnException(): void
    {
        self::expectException(CartesianCoordinateNotAllowedMovement::class);
    }

    private function thenShouldBeOrdinateCartesianCoordinate(
        $ordinateCartesianCoordinate
    ): void {
        self::assertInstanceOf(
            OrdinateCartesianCoordinate::class,
            $ordinateCartesianCoordinate
        );
    }
}
