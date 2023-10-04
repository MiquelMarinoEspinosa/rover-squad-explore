<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Integration\Application\RoverSquadExplore;

use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Movement\Cartesian\CartesianMovementFactoryDataMapper;
use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilderDataMapper;
use Core\Rover\Application\RoverSquadExplore\Response\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreResponseMapper;
use Core\Rover\Application\RoverSquadExplore\RoverSquadExploreUseCase;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovementFactory;
use Core\Rover\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianAreaBuilder;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilder;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirectionFactory;
use PHPUnit\Framework\TestCase;

final class RoverSquadExploreUseCaseTest extends TestCase
{
    private RoverSquadExploreUseCase $roverSquadExploreUseCase;

    protected function setUp(): void
    {
        $this->roverSquadExploreUseCase = new RoverSquadExploreUseCase(
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

    public function testShouldRoverSquadExplore(): void
    {
        self::assertTrue(true);
    }


}