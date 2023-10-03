<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore;

use Throwable;
use Core\Rover\Application\UseCase;
use Core\Rover\Domain\Rover\RoverBuilder;
use Core\Rover\Application\UseCaseRequest;
use Core\Rover\Domain\Movement\MovementFactory;
use Core\Rover\Application\RoverSquadExplore\Request\RoverSquadExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Response\RoverSquadExploreResponse;
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
            $roverBuilderData = $this->roverBuilderDataMapper->map($roverExploreRequest);
            $rover = $this->roverBuilder->build($roverBuilderData);
            foreach ($movementExploreCollectionRequests[$roverIndex] as $movementExploreRequest) {
                $movementFactoryData = $this->movementFactoryDataMapper->map($movementExploreRequest);
                $movement = $this->movementFactory->create($movementFactoryData);
                $rover = $movement->apply($rover);
            }

            $responses[] = $this->roverExploreResponseMapper->map(
                $rover->position()
            );
        }

        return $responses;
    }
}
