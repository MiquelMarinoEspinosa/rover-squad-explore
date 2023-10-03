<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate;

use Core\Rover\Domain\Rover\Rover;
use Core\Rover\Domain\Rover\RoverBuilderData;
use Core\Rover\Domain\Rover\Cartesian\CartesianRoverBuilder;
use Core\Rover\Domain\Rover\Area\Cartesian\CartesianAreaBuilder;
use Core\Rover\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianArea;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirection;
use Core\Rover\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianAreaBuilderData;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirectionAbstractFactory;

final class CartesianCardinalCoordinateRoverBuilder implements CartesianRoverBuilder
{
    public function __construct(
        private CartesianAreaBuilder $cartesianAreaBuilder,
        private CartesianCardinalDirectionAbstractFactory $cartesianCardinalDirectionAbstractFactory
    ) {

    }

    public function build(RoverBuilderData $data): Rover
    {
        return CartesianCardinalCoordinateRover::create(
            $this->buidlArea($data),
            $this->buildCardinal($data),
            $data->positionAbscissa(),
            $data->positionOrdinate()
        );
    }

    private function buidlArea(
        RoverBuilderData $data
    ): RectangularCartesianArea {
        $areaData = new RectangularCartesianAreaBuilderData(
            $data->areaUpperRightAbscissa(),
            $data->areaUpperRightOrdinate()
        );
        
        return $this->cartesianAreaBuilder->build($areaData);
    }

    private function buildCardinal(
        RoverBuilderData $data
    ): CartesianCardinalDirection {

        return $this->cartesianCardinalDirectionAbstractFactory->create(
            $data->positionCardinal()
        );
    }
}
