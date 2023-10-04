<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\RoverSquadExplore;

use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Movement\Cartesian\CartesianMovementFactoryDataMapper;
use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Rover;
use Core\Rover\Application\UseCase;
use Core\Rover\Domain\Rover\RoverBuilder;
use PHPUnit\Framework\MockObject\MockObject;
use Core\Rover\Application\RoverSquadExplore\RoverSquadExploreUseCase;
use Core\Rover\Application\RoverSquadExplore\Request\RoverSquadExploreRequest;
use Core\Rover\Application\RoverSquadExplore\RoverSquadExploreUseCaseException;
use Core\Rover\Application\RoverSquadExplore\Response\RoverSquadExploreResponse;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverPosition;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilderData;
use Core\Rover\Application\RoverSquadExplore\Request\Movement\Cartesian\CartesianMovementExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Request\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Response\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreResponse;
use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilderDataMapper;
use Core\Rover\Application\RoverSquadExplore\Response\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreResponseMapper;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovementFactoryData;
use Core\Rover\Domain\Movement\Movement;
use Core\Rover\Domain\Movement\MovementFactory;

final class RoverSquadExploreUseCaseTest extends TestCase
{
    private const MOVEMENT_VALUE            = 'L';
    private const AREA_UPPER_RIGHT_ABSCISSA = 5;
    private const AREA_UPPER_RIGHT_ORDINATE = 6;
    private const POSITION_CARDINAL         = 'N';
    private const POSITION_ABSCISSA         = 0;
    private const POSITION_ORDINATE         = 1;

    private MockObject $roverBuilder;
    private MockObject $movementFactory;
    private RoverSquadExploreUseCase $roverSquadExploreUseCase;

    protected function setUp(): void
    {
        $this->roverBuilder = self::createMock(RoverBuilder::class);
        $this->movementFactory = self::createMock(MovementFactory::class);

        $this->roverSquadExploreUseCase = new RoverSquadExploreUseCase(
            new CartesianCardinalCoordinateRoverBuilderDataMapper,
            $this->roverBuilder,
            new CartesianMovementFactoryDataMapper,
            $this->movementFactory,
            new CartesianCardinalCoordinateRoverExploreResponseMapper
        );
    }

    public function testShouldRoverSquadExploreUseCase(): void
    {
        $roverSquadExploreUseCase = new RoverSquadExploreUseCase(
            new CartesianCardinalCoordinateRoverBuilderDataMapper,
            $this->roverBuilder,
            new CartesianMovementFactoryDataMapper,
            $this->movementFactory,
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
        $emptyMovementExploreCollectionRequests = [];
        $emptyRoverExploreRequests    = [];

        $emptyRequest = new RoverSquadExploreRequest(
            $emptyRoverExploreRequests,
            $emptyMovementExploreCollectionRequests
        );

        $emptyResponse = new RoverSquadExploreResponse([]);

        $response = $this->roverSquadExploreUseCase->execute($emptyRequest);

        self::assertEquals(
            $emptyResponse,
            $response
        );
    }

    public function testGivenAnEmptyRoverRequestAndGivenMovementsWhenExecuteShouldThrowAnException(): void
    {
        $emptyRoverExploreRequests = [];

        $movementExploreCollectionRequests = $this->givenMovementExploreCollectionRequests();

        $emptyRoverRequest = new RoverSquadExploreRequest(
            $emptyRoverExploreRequests,
            $movementExploreCollectionRequests
        );

        self::expectException(
            RoverSquadExploreUseCaseException::class
        );

        $this->roverSquadExploreUseCase->execute($emptyRoverRequest);
    }

    public function testShouldThrowAnExceptionWhenRoverBuilderFails(): void
    {
        $movementExploreCollectionRequests = $this->givenMovementExploreCollectionRequests();

        $roverExploreRequests = $this->givenRoverExploreRequests();

        $roverRequest = new RoverSquadExploreRequest(
            $roverExploreRequests,
            $movementExploreCollectionRequests
        );

        $roverBuilderData = $this->givenRoverBuilderData();

        $this->roverBuilder
            ->expects(self::once())
            ->method('build')
            ->with($roverBuilderData)
            ->willThrowException(new \Exception);

        self::expectException(
            RoverSquadExploreUseCaseException::class
        );

        $this->roverSquadExploreUseCase->execute(
            $roverRequest
        );
    }

    public function testShouldThrowAnExceptionWhenMovementFactoryFails(): void
    {
        $movementExploreCollectionRequests = $this->givenMovementExploreCollectionRequests();

        $roverExploreRequests = $this->givenRoverExploreRequests();

        $roverRequest = new RoverSquadExploreRequest(
            $roverExploreRequests,
            $movementExploreCollectionRequests
        );

        $movementFactoryData = new CartesianMovementFactoryData(
            self::MOVEMENT_VALUE
        );

        $this->givenBuildRover();

        $this->movementFactory
            ->expects(self::once())
            ->method('create')
            ->with($movementFactoryData)
            ->willThrowException(new \Exception);

        self::expectException(
            RoverSquadExploreUseCaseException::class
        );

        $this->roverSquadExploreUseCase->execute(
            $roverRequest
        );
    }

    public function testShouldThrowAnExceptionWhenMovementApplyFails(): void
    {
        $movementExploreCollectionRequests = $this->givenMovementExploreCollectionRequests();

        $roverExploreRequests = $this->givenRoverExploreRequests();

        $roverRequest = new RoverSquadExploreRequest(
            $roverExploreRequests,
            $movementExploreCollectionRequests
        );

        $movementFactoryData = new CartesianMovementFactoryData(
            self::MOVEMENT_VALUE
        );

        $rover = $this->givenBuildRover();

        $movement = $this->createMock(Movement::class);

        $movement->expects(self::once())
            ->method('apply')
            ->with($rover)
            ->willThrowException(new \Exception);

        $this->movementFactory
            ->expects(self::once())
            ->method('create')
            ->with($movementFactoryData)
            ->willReturn($movement);

        self::expectException(
            RoverSquadExploreUseCaseException::class
        );

        $this->roverSquadExploreUseCase->execute(
            $roverRequest
        );
    }

    public function testShouldSuccessfulExplore(): void
    {
        $movementExploreCollectionRequests = $this->givenMovementExploreCollectionRequests();

        $roverExploreRequests = $this->givenRoverExploreRequests();

        $roverRequest = new RoverSquadExploreRequest(
            $roverExploreRequests,
            $movementExploreCollectionRequests
        );

        $movementFactoryData = new CartesianMovementFactoryData(
            self::MOVEMENT_VALUE
        );

        $rover = $this->givenBuildRover();

        $position = $this->givenRoverPosition();
        
        $rover->expects(self::once())
            ->method('position')
            ->willReturn($position);

        $movement = $this->createMock(Movement::class);

        $movement->expects(self::once())
            ->method('apply')
            ->with($rover)
            ->willReturn($rover);

        $this->movementFactory
            ->expects(self::once())
            ->method('create')
            ->with($movementFactoryData)
            ->willReturn($movement);

        $response = $this->roverSquadExploreUseCase->execute(
            $roverRequest
        );

        $expectedResponse = new RoverSquadExploreResponse(
            [
                new CartesianCardinalCoordinateRoverExploreResponse(
                    self::POSITION_ABSCISSA,
                    self::POSITION_ORDINATE,
                    self::POSITION_CARDINAL
                )
            ]
        );

        self::assertEquals(
            $expectedResponse->roverExploreResponses(),
            $response->roverExploreResponses()
        );
    }

    private function givenMovementExploreCollectionRequests(): array
    {
        return [
            [
                new CartesianMovementExploreRequest(
                    self::MOVEMENT_VALUE
                )
            ]
        ];
    }

    private function givenRoverExploreRequests(): array
    {
        return [
            new CartesianCardinalCoordinateRoverExploreRequest(
                self::AREA_UPPER_RIGHT_ABSCISSA,
                self::AREA_UPPER_RIGHT_ORDINATE,
                self::POSITION_ABSCISSA,
                self::POSITION_ORDINATE,
                self::POSITION_CARDINAL
            )
        ];
    }

    private function givenBuildRover(): MockObject
    {
        $roverBuilderData = $this->givenRoverBuilderData();

        $rover = self::createMock(Rover::class);

        $this->roverBuilder->expects(self::once())
            ->method('build')
            ->with($roverBuilderData)
            ->willReturn($rover);

        return $rover;
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

    private function givenRoverPosition(): CartesianCardinalCoordinateRoverPosition
    {
        return new CartesianCardinalCoordinateRoverPosition(
            self::POSITION_CARDINAL,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE
        );
    }
}
