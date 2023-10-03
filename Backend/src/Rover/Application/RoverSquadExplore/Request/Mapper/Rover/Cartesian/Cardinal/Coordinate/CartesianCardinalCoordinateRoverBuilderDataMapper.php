<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore\Request\Mapper\Rover\Cartesian\Cardinal\Coordinate;

use Core\Rover\Domain\Rover\RoverBuilderData;
use Core\Rover\Application\RoverSquadExplore\Request\Rover\RoverExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Rover\RoverBuilderDataMapper;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilderData;

final class CartesianCardinalCoordinateRoverBuilderDataMapper implements RoverBuilderDataMapper
{
    public function map(
        RoverExploreRequest $request
    ): RoverBuilderData {
        return new CartesianCardinalCoordinateRoverBuilderData(
            $request->areaUpperRightAbscissa(),
            $request->areaUpperRightOrdinate(),
            $request->positionCardinal(),
            $request->positionAbscissa(),
            $request->positionOrdinate()
        );
    }
}
