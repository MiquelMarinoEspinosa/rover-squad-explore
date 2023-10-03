<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore;

use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Rover\RoverBuilderDataMapper;
use Core\Rover\Application\RoverSquadExplore\Response\RoverSquadExploreResponse;
use Core\Rover\Application\UseCase;
use Core\Rover\Application\UseCaseRequest;
use Core\Rover\Domain\Rover\RoverBuilder;
use Throwable;

final class RoverSquadExploreUseCase implements UseCase
{
    public function __construct(
        private RoverBuilderDataMapper $roverBuilderDataMapper,
        private RoverBuilder $roverBuilder
    ) {
    }

    public function execute(UseCaseRequest $request): RoverSquadExploreResponse
    {
        try {
            foreach ($request->roverExploreRequests() as $roverExploreRequest) {
                $roverBuilderData = $this->roverBuilderDataMapper->map($roverExploreRequest);

                $this->roverBuilder->build($roverBuilderData);
            }

            return new RoverSquadExploreResponse;
        } catch (Throwable $exception) {
            throw RoverSquadExploreUseCaseException::create(
                $exception->getMessage()
            );
        }
    }
}
