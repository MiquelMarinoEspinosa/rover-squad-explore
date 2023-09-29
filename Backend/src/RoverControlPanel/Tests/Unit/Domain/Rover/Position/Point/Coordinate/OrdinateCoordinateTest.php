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
        $oordinateCoordinate = new OrdinateCoordinate();

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
        self::expectException(NotAllowedMovement::class);

        $this->ordinateCoordinate->moveRight();
    }

    public function testShouldThrowAnExceptionWhenMoveLeft(): void
    {
        self::expectException(NotAllowedMovement::class);

        $this->ordinateCoordinate->moveRight();
    }

    private function givenOrdinateCoordinate(int $value): OrdinateCoordinate
    {
        return new OrdinateCoordinate($value);
    }
}
