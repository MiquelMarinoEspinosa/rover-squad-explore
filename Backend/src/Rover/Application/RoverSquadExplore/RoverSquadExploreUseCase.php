<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore;

use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Rover\RoverBuilderDataMapper;
use Core\Rover\Application\RoverSquadExplore\Request\RoverSquadExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Response\Mapper\Rover\RoverExploreResponseMapper;
use Core\Rover\Application\RoverSquadExplore\Response\RoverSquadExploreResponse;
use Core\Rover\Application\UseCase;
use Core\Rover\Application\UseCaseRequest;
use Core\Rover\Domain\Rover\RoverBuilder;
use Core\Rover\Domain\Rover\RoverSquad;
use Throwable;

final class RoverSquadExploreUseCase implements UseCase
{
    public function __construct(
        private RoverBuilderDataMapper $roverBuilderDataMapper,
        private RoverBuilder $roverBuilder,
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
        $roverSquad = new RoverSquad;

        foreach ($request->roverExploreRequests() as $roverExploreRequest) {
            $roverBuilderData = $this->roverBuilderDataMapper->map($roverExploreRequest);

            $rover = $this->roverBuilder->build($roverBuilderData);

            $roverSquad->add($rover);
        }

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
}
