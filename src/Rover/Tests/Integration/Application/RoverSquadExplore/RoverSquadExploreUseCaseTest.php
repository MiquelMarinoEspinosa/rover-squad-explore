<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Integration\Application\RoverSquadExplore;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovementFactory;
use Core\Rover\Application\RoverSquadExplore\RoverSquadExploreUseCase;
use Core\Rover\Application\RoverSquadExplore\Request\RoverSquadExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Response\RoverSquadExploreResponse;
use Core\Rover\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianAreaBuilder;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirectionFactory;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilder;
use Core\Rover\Application\RoverSquadExplore\Request\Movement\Cartesian\CartesianMovementExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Movement\Cartesian\CartesianMovementFactoryDataMapper;
use Core\Rover\Application\RoverSquadExplore\Request\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Response\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreResponse;
use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilderDataMapper;
use Core\Rover\Application\RoverSquadExplore\Response\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreResponseMapper;

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
            'Initial positions [12N, 33E], move [LMLMLMLMM, MMRMMRMRRM], final position [13N, 15E]' => [
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
                            ),
                            self::buildCartesianMovementExploreRequest(
                                'L'
                            ),
                            self::buildCartesianMovementExploreRequest(
                                'M'
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
                            ),
                            self::buildCartesianMovementExploreRequest(
                                'M'
                            ),
                            self::buildCartesianMovementExploreRequest(
                                'R'
                            ),
                            self::buildCartesianMovementExploreRequest(
                                'R'
                            ),
                            self::buildCartesianMovementExploreRequest(
                                'M'
                            )
                        ]
                    ]
                ),
                new RoverSquadExploreResponse(
                    [
                        self::buildCartesianCardinalCoordinateRoverExploreResponse(
                            1,
                            3,
                            'N'
                        ),
                        self::buildCartesianCardinalCoordinateRoverExploreResponse(
                            5,
                            1,
                            'E'
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
