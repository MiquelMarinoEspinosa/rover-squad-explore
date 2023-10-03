<?php

declare(strict_types=1);

namespace Core\Rover\Application\Explore\Response\Mapper\Rover\Cartesian\Cardinal\Coordinate;

use Core\Rover\Application\Explore\Response\Rover\RoverDiscoverResponse;
use Core\Rover\Application\Explore\Response\Mapper\Rover\RoverDiscoverResponseMapper;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverPosition;
use Core\Rover\Application\Explore\Response\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverDiscoverResponse;

final class CartesianCardinalCoordinateRoverDiscoverResponseMapper implements RoverDiscoverResponseMapper
{
    public function __construct(
        private CartesianCardinalCoordinateRoverPosition $roverPosition
    ) {

    }

    public function map(): RoverDiscoverResponse
    {
        return new CartesianCardinalCoordinateRoverDiscoverResponse(
            $this->roverPosition->cardinal(),
            $this->roverPosition->abscissa(),
            $this->roverPosition->ordinate()
        );
    }
}
