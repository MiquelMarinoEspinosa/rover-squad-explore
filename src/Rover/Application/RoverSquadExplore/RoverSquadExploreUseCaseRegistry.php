<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore;

use Core\Rover\Domain\Movement\Cartesian\CartesianMovementFactory;
use Core\Rover\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianAreaBuilder;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirectionFactory;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilder;
use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Movement\Cartesian\CartesianMovementFactoryDataMapper;
use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilderDataMapper;
use Core\Rover\Application\RoverSquadExplore\Response\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreResponseMapper;

final class RoverSquadExploreUseCaseRegistry
{
    private const CARTESIAN_COORDINATE_ID = 'cartesian.coordinate.rover_squad_explore_use_case';

    private static ?self $instance = null;
    private static $roverSquadExploreUseCases = [];

    private function __construct()
    {
        self::$roverSquadExploreUseCases[self::CARTESIAN_COORDINATE_ID] = $this->buildCartesianCoordinateRoverSquadUseCase();
    }

    public static function getInstance(): self
    {
        if (null !== self::$instance) {
            return self::$instance;
        }

        self::$instance = new self;

        return self::$instance;
    }

    public function get(
        string $roverSquadExploreUseCaseName
    ): RoverSquadExploreUseCase {
        if (!$this->existsRoverSquadUseCase($roverSquadExploreUseCaseName)) {
            throw RoverSquadExploreUseCaseUnknown::create(
                $roverSquadExploreUseCaseName
            );
        }

        return self::$roverSquadExploreUseCases[$roverSquadExploreUseCaseName];
    }

    private static function buildCartesianCoordinateRoverSquadUseCase(): RoverSquadExploreUseCase
    {
        return new RoverSquadExploreUseCase(
            new CartesianCardinalCoordinateRoverBuilderDataMapper,
            new CartesianCardinalCoordinateRoverBuilder(
                RectangularCartesianAreaBuilder::getInstance(),
                CartesianCardinalDirectionFactory::getInstance()
            ),
            new CartesianMovementFactoryDataMapper,
            CartesianMovementFactory::getInstance(),
            new CartesianCardinalCoordinateRoverExploreResponseMapper
        );
    }

    private function existsRoverSquadUseCase(
        $roverSquadExploreUseCaseName
    ): bool {
        return isset(self::$roverSquadExploreUseCases[$roverSquadExploreUseCaseName]);
    }
}
