<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\RoverSquadExplore;

use Core\Rover\Application\RoverSquadExplore\Request\RoverSquadExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Response\RoverSquadExploreResponse;
use Core\Rover\Application\RoverSquadExplore\RoverSquadExploreUseCase;
use Core\Rover\Application\UseCase;
use PHPUnit\Framework\TestCase;

final class RoverSquadExploreUseCaseTest extends TestCase
{
    public function testShouldRoverSquadExploreUseCase(): void
    {
        $roverSquadExploreUseCase = new roverSquadExploreUseCase;

        self::assertInstanceOf(
            RoverSquadExploreUseCase::class,
            $roverSquadExploreUseCase
        );

        self::assertInstanceOf(
            UseCase::class,
            $roverSquadExploreUseCase
        );
    }

    public function testGivenAnEmptyResponseWhenExecuteShouldReturnAnEmptyResponse(): void
    {
        $emptyRequest = new RoverSquadExploreRequest;

        $emptyResponse = new RoverSquadExploreResponse;

        $roverSquadExploreUseCase = new RoverSquadExploreUseCase;

        $response = $roverSquadExploreUseCase->execute($emptyRequest);

        self::assertEquals(
            $emptyResponse,
            $response
        );
    }
}
