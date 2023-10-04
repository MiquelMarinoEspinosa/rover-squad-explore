<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\RoverSquadExplore;

use Core\Rover\Application\RoverSquadExplore\RoverSquadExploreUseCaseRegistry;
use PHPUnit\Framework\TestCase;

final class RoverSquadExploreUseCaseRegistryTest extends TestCase
{
    public function testShouldInstantiateTheRoverSquadExploreUseCaseRegistry(): void
    {
        $roverSquadExploreUseCaseRegistry = RoverSquadExploreUseCaseRegistry::getInstance();

        self::assertInstanceOf(
            RoverSquadExploreUseCaseRegistry::class,
            $roverSquadExploreUseCaseRegistry
        );
    }

    public function testShouldReturnTheSameInstanceWhenGetInstanceTwice(): void
    {
        self::assertSame(
            RoverSquadExploreUseCaseRegistry::getInstance(),
            RoverSquadExploreUseCaseRegistry::getInstance()
        );
    }
}