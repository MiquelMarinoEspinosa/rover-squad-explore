<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\RoverSquadExplore;

use PHPUnit\Framework\TestCase;
use Core\Rover\Application\UseCase;
use Core\Rover\Domain\Rover\RoverBuilder;
use Core\Rover\Application\RoverSquadExplore\RoverSquadExploreUseCase;
use Core\Rover\Application\RoverSquadExplore\Request\RoverSquadExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Response\RoverSquadExploreResponse;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilderData;
use Core\Rover\Application\RoverSquadExplore\Request\Movement\Cartesian\CartesianMovementExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Request\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilderDataMapper;
use Core\Rover\Application\RoverSquadExplore\RoverSquadExploreUseCaseException;

final class RoverSquadExploreUseCaseTest extends TestCase
{
    private const MOVEMENT_VALUE            = 'L';
    private const AREA_UPPER_RIGHT_ABSCISSA = 5;
    private const AREA_UPPER_RIGHT_ORDINATE = 6;
    private const POSITION_CARDINAL         = 'N';
    private const POSITION_ABSCISSA         = 0;
    private const POSITION_ORDINATE         = 1;

    public function testShouldRoverSquadExploreUseCase(): void
    {
        $roverSquadExploreUseCase = new RoverSquadExploreUseCase(
            new CartesianCardinalCoordinateRoverBuilderDataMapper,
            self::createMock(RoverBuilder::class)
        );

        self::assertInstanceOf(
            RoverSquadExploreUseCase::class,
            $roverSquadExploreUseCase
        );

        self::assertInstanceOf(
            UseCase::class,
            $roverSquadExploreUseCase
        );
    }

    public function testGivenAnEmptyRequestWhenExecuteShouldReturnAnEmptyResponse(): void
    {
        $emptyRequest = new RoverSquadExploreRequest([], []);

        $emptyResponse = new RoverSquadExploreResponse;

        $roverSquadExploreUseCase = new RoverSquadExploreUseCase(
            new CartesianCardinalCoordinateRoverBuilderDataMapper,
            self::createMock(RoverBuilder::class)
        );

        $response = $roverSquadExploreUseCase->execute($emptyRequest);

        self::assertEquals(
            $emptyResponse,
            $response
        );
    }

    public function testGivenAnEmptyRoverRequestWhenExecuteShouldReturnAnEmptyResponse(): void
    {
        $emptyRoverRequest = new RoverSquadExploreRequest(
            [new CartesianMovementExploreRequest(
                self::MOVEMENT_VALUE
            )],
            []
        );

        $emptyResponse = new RoverSquadExploreResponse;

        $roverSquadExploreUseCase = new RoverSquadExploreUseCase(
            new CartesianCardinalCoordinateRoverBuilderDataMapper,
            self::createMock(RoverBuilder::class)
        );

        $response = $roverSquadExploreUseCase->execute($emptyRoverRequest);

        self::assertEquals(
            $emptyResponse,
            $response
        );
    }

    public function testShouldThrowAnExceptionWhenRoverBuilderFails(): void
    {
        $roverRequest = new RoverSquadExploreRequest(
            [],
            [
                new CartesianCardinalCoordinateRoverExploreRequest(
                    self::AREA_UPPER_RIGHT_ABSCISSA,
                    self::AREA_UPPER_RIGHT_ORDINATE,
                    self::POSITION_CARDINAL,
                    self::POSITION_ABSCISSA,
                    self::POSITION_ORDINATE
                )
            ]
        );

        $roverBuilderData = new CartesianCardinalCoordinateRoverBuilderData(
            self::AREA_UPPER_RIGHT_ABSCISSA,
            self::AREA_UPPER_RIGHT_ORDINATE,
            self::POSITION_CARDINAL,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE
        );

        $roverBuilder = self::createMock(RoverBuilder::class);

        $roverBuilder->expects(self::once())
            ->method('build')
            ->with($roverBuilderData)
            ->willThrowException(new \Exception);

        self::expectException(RoverSquadExploreUseCaseException::class);

        $roverSquadExploreUseCase = new RoverSquadExploreUseCase(
            new CartesianCardinalCoordinateRoverBuilderDataMapper,
            $roverBuilder
        );

        $roverSquadExploreUseCase->execute(
            $roverRequest
        );
    }
}
