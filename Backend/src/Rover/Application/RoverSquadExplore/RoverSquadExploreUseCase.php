<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore;

use Throwable;
use Core\Rover\Application\UseCase;
use Core\Rover\Domain\Rover\RoverSquad;
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
        if (empty($request->roverExploreRequests())) {
            return new RoverSquadExploreResponse([], []);
        }

        foreach ($request->movementExploreRequests() as $movementExploreRequest) {
            $movementFactoryData = $this->movementFactoryDataMapper->map($movementExploreRequest);
            $this->movementFactory->create($movementFactoryData);
        }

        $roverSquad = $this->buildRoverSquad(
            $request->roverExploreRequests()
        );

        $roverExploreResponses = [];

        while (!$roverSquad->end()) {

            $rover = $roverSquad->current();

            $roverExploreResponse = $this->roverExploreResponseMapper->map(
                $rover->position()
            );

            $roverExploreResponses[] = $roverExploreResponse;

            $roverSquad->next();
        }

        return new RoverSquadExploreResponse($roverExploreResponses);
    }

    private function buildRoverSquad(
        array $roverExploreRequests
    ): RoverSquad {
        $roverSquad = new RoverSquad;

        foreach ($roverExploreRequests as $roverExploreRequest) {
            $roverBuilderData = $this->roverBuilderDataMapper->map($roverExploreRequest);

            $rover = $this->roverBuilder->build($roverBuilderData);

            $roverSquad->add($rover);
        }

        return $roverSquad;
    }
}
