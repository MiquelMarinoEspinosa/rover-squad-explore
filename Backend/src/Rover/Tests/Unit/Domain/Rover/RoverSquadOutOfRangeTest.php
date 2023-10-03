<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover;

use Throwable;
use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Collection\CollectionOutOfRange;
use Core\Rover\Domain\Rover\RoverSquadOutOfRange;

final class RoverSquadOutOfRangeTest extends TestCase
{
    public function testShouldCreateTheRoverSquadOutOfRangeTest(): void
    {
        $roverSquadOutOfRangeTest = RoverSquadOutOfRange::create();

        self::assertInstanceOf(
            RoverSquadOutOfRange::class,
            $roverSquadOutOfRangeTest
        );

        self::assertInstanceOf(
            CollectionOutOfRange::class,
            $roverSquadOutOfRangeTest
        );

        self::assertInstanceOf(
            Throwable::class,
            $roverSquadOutOfRangeTest
        );
    }
}
