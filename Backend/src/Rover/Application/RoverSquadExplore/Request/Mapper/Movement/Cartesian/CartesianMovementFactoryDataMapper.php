<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore\Request\Mapper\Movement\Cartesian;

use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Movement\MovementFactoryDataMapper;
use Core\Rover\Application\RoverSquadExplore\Request\Movement\MovementExploreRequest;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovementFactoryData;
use Core\Rover\Domain\Movement\MovementFactoryData;

final readonly class CartesianMovementFactoryDataMapper implements MovementFactoryDataMapper
{
    public function map(
        MovementExploreRequest $request
    ): MovementFactoryData
    {
        return new CartesianMovementFactoryData(
            $request->movementValue()
        );
    }
}
