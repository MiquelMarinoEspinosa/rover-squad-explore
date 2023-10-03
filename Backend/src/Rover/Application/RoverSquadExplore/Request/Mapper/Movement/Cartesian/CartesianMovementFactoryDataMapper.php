<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore\Request\Mapper\Movement\Cartesian;

use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Movement\MovementFactoryDataMapper;
use Core\Rover\Application\RoverSquadExplore\Request\Movement\Cartesian\CartesianMovementExploreRequest;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovementFactoryData;
use Core\Rover\Domain\Movement\MovementFactoryData;

final readonly class CartesianMovementFactoryDataMapper implements MovementFactoryDataMapper
{
    public function __construct(
        private CartesianMovementExploreRequest $request
    ){

    }

    public function map(): MovementFactoryData
    {
        return new CartesianMovementFactoryData(
            $this->request->movementValue()
        );
    }
}
