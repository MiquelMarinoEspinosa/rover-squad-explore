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
        RoverSquadExploreResponse $expectedResponse
    ): void {
        $roverExploreUseCase = $this->givenCartesianCoordinateRoverSquadUseCase();

        self::assertEquals(
            $expectedResponse,
            $roverExploreUseCase->execute($request)
        );
    }

    public static function cartesianCoordinateRoverSquadExploreDataProvider(): array
    {
        return [
            'Initial position 12N, move L, final position 12W' => [
                new RoverSquadExploreRequest(
                    [
                        self::buildCartesianCardinalCoordinateRoverExploreRequest(
                            5,
                            5,
                            1,
                            2,
                            'N',
                        ),
                        self::buildCartesianCardinalCoordinateRoverExploreRequest(
                            5,
                            5,
                            3,
                            3,
                            'E',
                        )
                    ],
                    [
                        [
                            self::buildCartesianMovementExploreRequest(
                                'L'
                            ),
                            self::buildCartesianMovementExploreRequest(
                                'M'
                            ),
                            self::buildCartesianMovementExploreRequest(
                                'L'
                            ),
                            self::buildCartesianMovementExploreRequest(
                                'M'
                            ),
                            self::buildCartesianMovementExploreRequest(
                                'L'
                            ),
                            self::buildCartesianMovementExploreRequest(
                                'M'
                            )
                        ],
                        [
                            self::buildCartesianMovementExploreRequest(
                                'M'
                            ),
                            self::buildCartesianMovementExploreRequest(
                                'M'
                            ),
                            self::buildCartesianMovementExploreRequest(
                                'R'
                            ),
                            self::buildCartesianMovementExploreRequest(
                                'M'
                            ),
                            self::buildCartesianMovementExploreRequest(
                                'M'
                            ),
                            self::buildCartesianMovementExploreRequest(
                                'R'
                            )
                        ]
                    ]
                ),
                new RoverSquadExploreResponse(
                    [
                        self::buildCartesianCardinalCoordinateRoverExploreResponse(
                            1,
                            1,
                            'E'
                        ),
                        self::buildCartesianCardinalCoordinateRoverExploreResponse(
                            5,
                            1,
                            'W'
                        )
                    ]
                )
            ],
        ];
    }

    private static function givenCartesianCoordinateRoverSquadUseCase(): RoverSquadExploreUseCase
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

    private static function buildCartesianCardinalCoordinateRoverExploreRequest(
        int $upperRightAbscissa,
        int $upperRightOrdinate,
        int $abscissa,
        int $ordinate,
        string $cardinal
    ): CartesianCardinalCoordinateRoverExploreRequest {

        return new CartesianCardinalCoordinateRoverExploreRequest(
            $upperRightAbscissa,
            $upperRightOrdinate,
            $abscissa,
            $ordinate,
            $cardinal,
        );
    }

    private static function buildCartesianMovementExploreRequest(
        string $movementValue
    ): CartesianMovementExploreRequest {

        return new CartesianMovementExploreRequest(
            $movementValue
        );
    }

    private static function buildCartesianCardinalCoordinateRoverExploreResponse(
        int $abscissa,
        int $ordinate,
        string $cardinal
    ): CartesianCardinalCoordinateRoverExploreResponse {

        return new CartesianCardinalCoordinateRoverExploreResponse(
            $abscissa,
            $ordinate,
            $cardinal
        );
    }
}
