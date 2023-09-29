<?php

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point\Coordinate;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Coordinate;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\NotAllowedMovement;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\OrdinateCoordinate;
use PHPUnit\Framework\TestCase;

final class OrdinateCoordinateTest extends TestCase
{
    private const VALUE = 0;

    private OrdinateCoordinate $ordinateCoordinate;

    protected function setUp(): void
    {
        $this->ordinateCoordinate = $this->givenOrdinateCoordinate(self::VALUE);
    }

    public function testShouldCreateOrdinateCoordinate(): void
    {
        $oordinateCoordinate = $this->givenOrdinateCoordinate(self::VALUE);

        self::assertInstanceOf(
            OrdinateCoordinate::class,
            $oordinateCoordinate
        );

        self::assertInstanceOf(
            Coordinate::class,
            $oordinateCoordinate
        );
    }

    public function testShouldThrowAnExceptionWhenMoveRight(): void
    {
        $this->shouldThrowAnException();

        $this->ordinateCoordinate->moveRight();
    }

    public function testShouldThrowAnExceptionWhenMoveLeft(): void
    {
        $this->shouldThrowAnException();

        $this->ordinateCoordinate->moveLeft();
    }

    public function testShouldMoveUp(): void
    {
        $movedOrdinateCoordinate = $this->ordinateCoordinate->moveUp();

        self::assertInstanceOf(
            OrdinateCoordinate::class,
            $movedOrdinateCoordinate
        );

        self::assertSame(
            $movedOrdinateCoordinate->value(),
            $this->ordinateCoordinate->value() + 1
        );
    }

    public function testShouldMoveDown(): void
    {
        $movedOrdinateCoordinate = $this->ordinateCoordinate->moveDown();

        self::assertInstanceOf(
            OrdinateCoordinate::class,
            $movedOrdinateCoordinate
        );

        self::assertSame(
            $movedOrdinateCoordinate->value(),
            $this->ordinateCoordinate->value() - 1
        );
    }

    private function givenOrdinateCoordinate(int $value): OrdinateCoordinate
    {
        return new OrdinateCoordinate($value);
    }

    private function shouldThrowAnException(): void
    {
        self::expectException(NotAllowedMovement::class);
    }
}
