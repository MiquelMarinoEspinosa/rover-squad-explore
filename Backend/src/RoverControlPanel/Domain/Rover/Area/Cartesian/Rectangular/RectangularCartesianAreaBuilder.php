<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Area\Cartesian\Rectangular;

use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\CartesianArea;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\CartesianAreaBuilder;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\CartesianAreaBuilderData;

final class RectangularCartesianAreaBuilder implements CartesianAreaBuilder
{
    private static ?self $instance = null;

    public static function getInstance(): self
    {
        if (null !== self::$instance) {
            return self::$instance;
        }

        self::$instance = new self();

        return self::$instance;
    }

    public function create(
        CartesianAreaBuilderData $data
    ): CartesianArea {
        return RectangularCartesianArea::createWithUpperRightCoordinates(
            $data->upperRightAbscissa(),
            $data->upperRightOrdinate()
        );        
    }
}
