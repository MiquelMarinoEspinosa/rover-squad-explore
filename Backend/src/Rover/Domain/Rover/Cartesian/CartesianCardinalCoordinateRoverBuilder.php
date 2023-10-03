<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Cartesian;

use Core\Rover\Domain\Rover\Rover;
use Core\Rover\Domain\Rover\RoverBuilderData;
use Core\Rover\Domain\Rover\Area\Cartesian\CartesianAreaBuilder;
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
        $areaData = new RectangularCartesianAreaBuilderData(
            $data->areaUpperRightAbscissa(),
            $data->areaUpperRightOrdinate()
        );
        
        $area = $this->cartesianAreaBuilder->build($areaData);

        $cardinal = $this->cartesianCardinalDirectionAbstractFactory->create(
            $data->positionCardinal()
        );

        return CartesianCardinalCoordinateRover::create(
            $area,
            $cardinal,
            $data->positionAbscissa(),
            $data->positionOrdinate()
        );
    }
}
