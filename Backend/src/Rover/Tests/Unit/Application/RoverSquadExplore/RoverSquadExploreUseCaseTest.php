<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\RoverSquadExplore;

use PHPUnit\Framework\TestCase;
use Core\Rover\Application\UseCase;
use Core\Rover\Domain\Rover\RoverBuilder;
use Core\Rover\Application\RoverSquadExplore\RoverSquadExploreUseCase;
use Core\Rover\Application\RoverSquadExplore\Request\RoverSquadExploreRequest;
use Core\Rover\Application\RoverSquadExplore\RoverSquadExploreUseCaseException;
use Core\Rover\Application\RoverSquadExplore\Response\RoverSquadExploreResponse;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilderData;
use Core\Rover\Application\RoverSquadExplore\Request\Movement\Cartesian\CartesianMovementExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Request\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilderDataMapper;
use Core\Rover\Application\RoverSquadExplore\Response\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreResponseMapper;
use Core\Rover\Application\RoverSquadExplore\Response\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreResponse;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverPosition;
use Core\Rover\Domain\Rover\Rover;
use PHPUnit\Framework\MockObject\MockObject;

final class RoverSquadExploreUseCaseTest extends TestCase
{
    private const MOVEMENT_VALUE            = 'L';
    private const AREA_UPPER_RIGHT_ABSCISSA = 5;
    private const AREA_UPPER_RIGHT_ORDINATE = 6;
    private const POSITION_CARDINAL         = 'N';
    private const POSITION_ABSCISSA         = 0;
    private const POSITION_ORDINATE         = 1;

    private MockObject $roverBuilder;
    private RoverSquadExploreUseCase $roverSquadExploreUseCase;

    protected function setUp(): void
    {
        $this->roverBuilder = self::createMock(RoverBuilder::class);

        $this->roverSquadExploreUseCase = new RoverSquadExploreUseCase(
            new CartesianCardinalCoordinateRoverBuilderDataMapper,
            $this->roverBuilder,
            new CartesianCardinalCoordinateRoverExploreResponseMapper
        );
    }

    public function testShouldRoverSquadExploreUseCase(): void
    {
        $roverSquadExploreUseCase = new RoverSquadExploreUseCase(
            new CartesianCardinalCoordinateRoverBuilderDataMapper,
            self::createMock(RoverBuilder::class),
            new CartesianCardinalCoordinateRoverExploreResponseMapper
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
        $emptyMovementExploreRequests = [];
        $emptyRoverExploreRequests    = [];

        $emptyRequest = new RoverSquadExploreRequest(
            $emptyMovementExploreRequests,
            $emptyRoverExploreRequests
        );

        $emptyResponse = new RoverSquadExploreResponse([]);

        $response = $this->roverSquadExploreUseCase->execute($emptyRequest);

        self::assertEquals(
            $emptyResponse,
            $response
        );
    }

    public function testGivenAnEmptyRoverRequestWhenExecuteShouldReturnAnEmptyResponse(): void
    {
        $emptyRoverExploreRequests = [];

        $movementExploreRequests = $this->givenMovementExploreRequests();

        $emptyRoverRequest = new RoverSquadExploreRequest(
            $movementExploreRequests,
            $emptyRoverExploreRequests
        );

        $emptyRoverExploreResponses = [];

        $emptyResponse = new RoverSquadExploreResponse(
            $emptyRoverExploreResponses
        );

        $response = $this->roverSquadExploreUseCase->execute($emptyRoverRequest);

        self::assertEquals(
            $emptyResponse,
            $response
        );
    }

    public function testShouldThrowAnExceptionWhenRoverBuilderFails(): void
    {
        $emptyMovementExploreRequests = [];

        $roverExploreRequests = $this->givenRoverExploreRequests();


        $roverRequest = new RoverSquadExploreRequest(
            $emptyMovementExploreRequests,
            $roverExploreRequests
        );

        $roverBuilderData = $this->givenRoverBuilderData();

        $this->roverBuilder->expects(self::once())
            ->method('build')
            ->with($roverBuilderData)
            ->willThrowException(new \Exception);

        self::expectException(RoverSquadExploreUseCaseException::class);

        $this->roverSquadExploreUseCase->execute(
            $roverRequest
        );
    }

    public function testGivenNoMovementsWhenExecuteThenShouldReturnTheRoverPositionResponse(): void
    {
        $emptyMovementExploreRequests = [];

        $roverExploreRequests = $this->givenRoverExploreRequests();


        $roverRequest = new RoverSquadExploreRequest(
            $emptyMovementExploreRequests,
            $roverExploreRequests
        );

        $roverBuilderData = $this->givenRoverBuilderData();

        $roverPosition = new CartesianCardinalCoordinateRoverPosition(
            self::POSITION_CARDINAL,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE
        );

        $rover = self::createMock(Rover::class);
        $rover->expects(self::once())
            ->method('position')
            ->willReturn($roverPosition);

        $this->roverBuilder->expects(self::once())
            ->method('build')
            ->with($roverBuilderData)
            ->willReturn($rover);

        $response = $this->roverSquadExploreUseCase->execute(
            $roverRequest
        );

        $roverExploreResponse = new CartesianCardinalCoordinateRoverExploreResponse(
            self::POSITION_CARDINAL,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE
        );

        $expectedResponse = new RoverSquadExploreResponse(
            [$roverExploreResponse]
        );

        self::assertEquals(
            $expectedResponse->roverExploreResponses(),
            $response->roverExploreResponses()
        );
    }

    private function givenMovementExploreRequests(): array
    {
        return [
            new CartesianMovementExploreRequest(
                self::MOVEMENT_VALUE
            )
        ];
    }

    private function givenRoverExploreRequests(): array
    {
        return [
            new CartesianCardinalCoordinateRoverExploreRequest(
                self::AREA_UPPER_RIGHT_ABSCISSA,
                self::AREA_UPPER_RIGHT_ORDINATE,
                self::POSITION_CARDINAL,
                self::POSITION_ABSCISSA,
                self::POSITION_ORDINATE
            )
        ];
    }

    private function givenRoverBuilderData(): CartesianCardinalCoordinateRoverBuilderData
    {
        return new CartesianCardinalCoordinateRoverBuilderData(
            self::AREA_UPPER_RIGHT_ABSCISSA,
            self::AREA_UPPER_RIGHT_ORDINATE,
            self::POSITION_CARDINAL,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE
        );
    }
}
