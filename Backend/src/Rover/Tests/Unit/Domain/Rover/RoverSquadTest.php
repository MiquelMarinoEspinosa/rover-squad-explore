<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Rover;
use Core\Rover\Domain\Rover\RoverSquad;
use Core\Rover\Domain\Collection\Collection;
use Core\Rover\Domain\Rover\RoverSquadOutOfRange;

final class RoverSquadTest extends TestCase
{
    private RoverSquad $roverSquad;

    protected function setUp(): void
    {
        $this->roverSquad = new RoverSquad;
    }

    public function testShouldCreateTheRoverSquad(): void
    {
        $roverSquad = new RoverSquad;

        self::assertInstanceOf(
            RoverSquad::class,
            $roverSquad
        );

        self::assertInstanceOf(
            Collection::class,
            $roverSquad
        );
    }

    public function testShouldReturnTrueWhenEmptyMethodExecutedOnEmpty(): void
    {
        self::assertTrue(
            $this->roverSquad->empty()
        );
    }

    public function testShouldReturnTrueWhenEndMethodExecutedOnEmpty(): void
    {
        self::assertTrue(
            $this->roverSquad->end()
        );
    }

    public function testShouldThrowAnExceptionWhenCurrentMethodExecutedOnEmpty(): void
    {
        self::expectException(
            RoverSquadOutOfRange::class
        );

        $this->roverSquad->current();
    }

    public function testShouldAddTheRover(): void
    {
        $rover = self::createMock(Rover::class);

        $this->roverSquad->add($rover);

        self::assertSame(
            $rover,
            $this->roverSquad->current()
        );
    }

    public function testShouldNotBeEmpty(): void
    {
        $rover = self::createMock(Rover::class);

        $this->roverSquad->add($rover);

        self::assertFalse(
            $this->roverSquad->empty()
        );
    }

    public function testShouldNotHaveEnd(): void
    {
        $rover = self::createMock(Rover::class);

        $this->roverSquad->add($rover);

        self::assertFalse(
            $this->roverSquad->end()
        );
    }

    public function testShouldHaveEndAfterNext(): void
    {
        $rover = self::createMock(Rover::class);

        $this->roverSquad->add($rover);

        self::assertFalse(
            $this->roverSquad->end()
        );

        $this->roverSquad->next();

        self::assertTrue(
            $this->roverSquad->end()
        );
    }
}
