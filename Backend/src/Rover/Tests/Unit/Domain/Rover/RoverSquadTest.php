<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Collection;
use Core\Rover\Domain\Rover\RoverSquad;

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

    public function testShouldReturnTrueWhenEmptyMethodExecuted(): void
    {
        self::assertTrue(
            $this->roverSquad->empty()
        );
    }

    public function testShouldReturnFalseWhenNextMethodExecuted(): void
    {
        self::assertTrue(
            $this->roverSquad->next()
        );
    }
}
