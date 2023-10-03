<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\RoverSquadExplore;

use Core\Rover\Application\RoverSquadExplore\CreateRoverSquadExploreUseCase;
use Core\Rover\Application\UseCase;
use PHPUnit\Framework\TestCase;

final class RoverSquadExploreUseCaseTest extends TestCase
{
    public function testShouldCreateRoverSquadExploreUseCase(): void
    {
        $createRoverSquadExploreUseCase = new CreateRoverSquadExploreUseCase;

        self::assertInstanceOf(
            CreateRoverSquadExploreUseCase::class,
            $createRoverSquadExploreUseCase
        );

        self::assertInstanceOf(
            UseCase::class,
            $createRoverSquadExploreUseCase
        );
    }
}
