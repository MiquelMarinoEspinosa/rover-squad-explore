<?php

declare(strict_types=1);

namespace Core\Rover\Application\Explore\Mapper\Movement\Cartesian;

use Core\Rover\Application\Explore\Mapper\Movement\MovementFactoryDataMapper;
use Core\Rover\Application\Explore\Request\Movement\Cartesian\CartesianMovementDiscoverRequest;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovementFactoryData;
use Core\Rover\Domain\Movement\MovementFactoryData;

final readonly class CartesianMovementFactoryDataMapper implements MovementFactoryDataMapper
{
    public function __construct(
        private CartesianMovementDiscoverRequest $request
    ){

    }

    public function map(): MovementFactoryData
    {
        return new CartesianMovementFactoryData(
            $this->request->movementValue()
        );
    }
}
