<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore\Response\Mapper\Rover\Cartesian\Cardinal\Coordinate;

use Core\Rover\Application\RoverSquadExplore\Response\Rover\RoverExploreResponse;
use Core\Rover\Application\RoverSquadExplore\Response\Mapper\Rover\RoverExploreResponseMapper;
use Core\Rover\Application\RoverSquadExplore\Response\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreResponse;
use Core\Rover\Domain\Rover\RoverPosition;

final class CartesianCardinalCoordinateRoverExploreResponseMapper implements RoverExploreResponseMapper
{
    public function map(
        RoverPosition $roverPosition
    ): RoverExploreResponse
    {
        return new CartesianCardinalCoordinateRoverExploreResponse(
            $roverPosition->abscissa(),
            $roverPosition->ordinate(),
            $roverPosition->cardinal()
        );
    }
}
