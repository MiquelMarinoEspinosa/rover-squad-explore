<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\RoverSquadExplore;

use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Movement\Cartesian\CartesianMovementFactoryDataMapper;
use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilderDataMapper;
use Core\Rover\Application\RoverSquadExplore\Response\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreResponseMapper;
use Core\Rover\Application\RoverSquadExplore\RoverSquadExploreUseCase;
use Core\Rover\Application\RoverSquadExplore\RoverSquadExploreUseCaseRegistry;
use Core\Rover\Application\RoverSquadExplore\RoverSquadExploreUseCaseUnknown;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovementFactory;
use Core\Rover\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianAreaBuilder;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilder;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirectionFactory;
use PHPUnit\Framework\TestCase;

final class RoverSquadExploreUseCaseRegistryTest extends TestCase
{
    public function testShouldInstantiateTheRoverSquadExploreUseCaseRegistry(): void
    {
        $roverSquadExploreUseCaseRegistry = RoverSquadExploreUseCaseRegistry::getInstance();

        self::assertInstanceOf(
            RoverSquadExploreUseCaseRegistry::class,
            $roverSquadExploreUseCaseRegistry
        );
    }

    public function testShouldReturnTheSameInstanceWhenGetInstanceTwice(): void
    {
        self::assertSame(
            RoverSquadExploreUseCaseRegistry::getInstance(),
            RoverSquadExploreUseCaseRegistry::getInstance()
        );
    }

    public function testShouldThrowAnExceptionWhenGetUnknownService(): void
    {
        $registry = RoverSquadExploreUseCaseRegistry::getInstance();

        self::expectException(
            RoverSquadExploreUseCaseUnknown::class
        );
        
        $registry->get(
            'unknown'
        );
    }

    public function tesShouldReturnTheCartesianCoordinateRoverSquadExploreUseCase(): void
    {
        $registry = RoverSquadExploreUseCaseRegistry::getInstance();

        $useCase = $registry->get(
            'cartesian.coordinate.rover_squad_explore_use_case'
        );

        $expectedUseCase = $this->buildCartesianCoordinateRoverSquadUseCase();

        self::assertEquals(
            $expectedUseCase,
            $useCase
        );
    }

    private function buildCartesianCoordinateRoverSquadUseCase(): RoverSquadExploreUseCase
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
}
