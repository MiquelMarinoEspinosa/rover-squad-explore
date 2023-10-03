<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore\Response\Mapper\Rover\Cartesian\Cardinal\Coordinate;

use Core\Rover\Application\RoverSquadExplore\Response\Rover\RoverExploreResponse;
use Core\Rover\Application\RoverSquadExplore\Response\Mapper\Rover\RoverExploreResponseMapper;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverPosition;
use Core\Rover\Application\RoverSquadExplore\Response\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreResponse;

final class CartesianCardinalCoordinateRoverExploreResponseMapper implements RoverExploreResponseMapper
{
    public function __construct(
        private CartesianCardinalCoordinateRoverPosition $roverPosition
    ) {

    }

    public function map(): RoverExploreResponse
    {
        return new CartesianCardinalCoordinateRoverExploreResponse(
            $this->roverPosition->cardinal(),
            $this->roverPosition->abscissa(),
            $this->roverPosition->ordinate()
        );
    }
}
