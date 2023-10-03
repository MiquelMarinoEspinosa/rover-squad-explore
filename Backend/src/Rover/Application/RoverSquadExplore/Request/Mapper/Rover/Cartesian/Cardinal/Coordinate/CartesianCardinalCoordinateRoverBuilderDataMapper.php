<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore\Request\Mapper\Rover\Cartesian\Cardinal\Coordinate;

use Core\Rover\Domain\Rover\RoverBuilderData;
use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Rover\RoverBuilderDataMapper;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilderData;
use Core\Rover\Application\RoverSquadExplore\Request\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreRequest;

final class CartesianCardinalCoordinateRoverBuilderDataMapper implements RoverBuilderDataMapper
{
    public function __construct(
        private CartesianCardinalCoordinateRoverExploreRequest $request
    ) {
    }

    public function map(): RoverBuilderData
    {
        return new CartesianCardinalCoordinateRoverBuilderData(
            $this->request->areaUpperRightAbscissa(),
            $this->request->areaUpperRightOrdinate(),
            $this->request->positionCardinal(),
            $this->request->positionAbscissa(),
            $this->request->positionOrdinate()
        );
    }
}
