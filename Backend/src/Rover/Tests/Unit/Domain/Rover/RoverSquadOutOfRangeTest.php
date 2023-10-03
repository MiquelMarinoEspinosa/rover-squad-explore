<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover;

use Core\Rover\Domain\CollectionOutOfRange;
use Core\Rover\Domain\Rover\RoverSquadOutOfRange;
use PHPUnit\Framework\TestCase;
use Throwable;

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
