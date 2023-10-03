<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore;

use Throwable;
use Core\Rover\Domain\Rover\Rover;
use Core\Rover\Application\UseCase;
use Core\Rover\Domain\Rover\RoverBuilder;
use Core\Rover\Application\UseCaseRequest;
use Core\Rover\Domain\Movement\MovementFactory;
use Core\Rover\Application\RoverSquadExplore\Request\RoverSquadExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Request\Rover\RoverExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Response\RoverSquadExploreResponse;
use Core\Rover\Application\RoverSquadExplore\Response\Rover\RoverExploreResponse;
use Core\Rover\Application\RoverSquadExplore\Request\Movement\MovementExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Rover\RoverBuilderDataMapper;
use Core\Rover\Application\RoverSquadExplore\Response\Mapper\Rover\RoverExploreResponseMapper;
use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Movement\Cartesian\CartesianMovementFactoryDataMapper;

final class RoverSquadExploreUseCase implements UseCase
{
    private const ERROR_MESSAGE = 'Not valid request. Rover and movements collection should be same number';

    public function __construct(
        private RoverBuilderDataMapper $roverBuilderDataMapper,
        private RoverBuilder $roverBuilder,
        private CartesianMovementFactoryDataMapper $movementFactoryDataMapper,
        private MovementFactory $movementFactory,
        private RoverExploreResponseMapper $roverExploreResponseMapper
    ) {
    }

    public function execute(UseCaseRequest $request): RoverSquadExploreResponse
    {
        $this->validateRequest($request);

        try {
            return $this->explore($request);
        } catch (Throwable $exception) {
            throw RoverSquadExploreUseCaseException::create(
                $exception->getMessage()
            );
        }
    }

    private function explore(RoverSquadExploreRequest $request): RoverSquadExploreResponse
    {
        $movementExploreCollectionRequests = $request->movementExploreCollectionRequests();
        $roverExploreRequests = $request->roverExploreRequests();
        
        $responses = $this->roverSquadExploration(
            $movementExploreCollectionRequests,
            $roverExploreRequests
        );

        return new RoverSquadExploreResponse($responses);
    }

    private function validateRequest(RoverSquadExploreRequest $request): void
    {
        if (count($request->roverExploreRequests()) !== count($request->movementExploreCollectionRequests())) {
            throw RoverSquadExploreUseCaseException::create(
                self::ERROR_MESSAGE
            );
        }
    }

    private function roverSquadExploration(
        array $movementExploreCollectionRequests,
        array $roverExploreRequests
    ): array {
        $responses = [];

        foreach ($roverExploreRequests as $roverIndex => $roverExploreRequest) {
            $responses[] = $this->roverExploration(
                $roverExploreRequest,
                $movementExploreCollectionRequests[$roverIndex]
            );
        }

        return $responses;
    }

    private function roverExploration(
        RoverExploreRequest $roverExploreRequest,
        array $movementExploreRequests,
    ): RoverExploreResponse {
        $rover = $this->buildRover($roverExploreRequest);
        
        $rover = $this->applyMovements(
            $rover,
            $movementExploreRequests
        );

        return $this->roverExploreResponseMapper->map(
            $rover->position()
        );
    }

    private function buildRover(
        RoverExploreRequest $roverExploreRequest
    ): Rover {
        $roverBuilderData = $this->roverBuilderDataMapper->map($roverExploreRequest);
        
        return $this->roverBuilder->build($roverBuilderData);
    }

    public function applyMovements(
        Rover $rover,
        array $movementExploreRequests
    ): Rover {
        foreach ($movementExploreRequests as $movementExploreRequest) {
            $rover = $this->applyMovement(
                $rover,
                $movementExploreRequest
            );
        }

        return $rover;
    }

    private function applyMovement(
        Rover $rover,
        MovementExploreRequest $movementExploreRequest
    ) {
        $movementFactoryData = $this->movementFactoryDataMapper->map($movementExploreRequest);
        $movement = $this->movementFactory->create($movementFactoryData);
        
        return $movement->apply($rover);
    }
}
