<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Integration\Application\RoverSquadExplore;

use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Movement\Cartesian\CartesianMovementFactoryDataMapper;
use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilderDataMapper;
use Core\Rover\Application\RoverSquadExplore\Request\Movement\Cartesian\CartesianMovementExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Request\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Request\RoverSquadExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Response\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreResponseMapper;
use Core\Rover\Application\RoverSquadExplore\Response\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreResponse;
use Core\Rover\Application\RoverSquadExplore\Response\RoverSquadExploreResponse;
use Core\Rover\Application\RoverSquadExplore\RoverSquadExploreUseCase;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovementFactory;
use Core\Rover\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianAreaBuilder;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilder;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirectionFactory;
use PHPUnit\Framework\TestCase;

final class RoverSquadExploreUseCaseTest extends TestCase
{
    /**
     * @dataProvider cartesianCoordinateRoverSquadExploreDataProvider
     */
    public function testShouldCartesianCoordinateRoverSquadExplore(
        RoverSquadExploreRequest $request,
        RoverSquadExploreResponse $response
    ): void {
        $roverExploreUseCase = $this->givenCartesianCoordinateRoverSquadUseCase();

        self::assertEquals(
            $response,
            $roverExploreUseCase->execute($request)
        );
    }

    public static function cartesianCoordinateRoverSquadExploreDataProvider(): array
    {
        return [
            'Initial position 12N, move L, final position 12W' => [
                new RoverSquadExploreRequest(
                    [
                        new CartesianCardinalCoordinateRoverExploreRequest(
                            5,
                            5,
                            1,
                            2,
                            'N',
                        )
                    ],
                    [
                        [new CartesianMovementExploreRequest(
                            'L'
                        )]
                    ]
                ),
                new RoverSquadExploreResponse(
                    [
                        new CartesianCardinalCoordinateRoverExploreResponse(
                            1,
                            2,
                            'W'
                        )
                    ]
                )
            ]
        ];
    }

    private function givenCartesianCoordinateRoverSquadUseCase(): RoverSquadExploreUseCase
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
