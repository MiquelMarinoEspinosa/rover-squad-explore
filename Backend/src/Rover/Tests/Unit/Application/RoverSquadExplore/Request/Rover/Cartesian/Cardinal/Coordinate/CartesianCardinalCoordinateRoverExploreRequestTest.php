<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\RoverSquadExplore\Request\Rover\Cartesian\Cardinal\Coordinate;

use PHPUnit\Framework\TestCase;
use Core\Rover\Application\RoverSquadExplore\Request\Rover\RoverExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Request\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreRequest;

final class CartesianCardinalCoordinateRoverExploreRequestTest extends TestCase
{
    private const AREA_UPPER_RIGHT_ABSCISSA = 5;
    private const AREA_UPPER_RIGHT_ORDINATE = 6;
    private const POSITION_CARDINAL         = 'N';
    private const POSITION_ABSCISSA         = 0;
    private const POSITION_ORDINATE         = 1;

    private CartesianCardinalCoordinateRoverExploreRequest $roverExploreRequest;

    protected function setUp(): void 
    {
        $this->roverExploreRequest = new CartesianCardinalCoordinateRoverExploreRequest(
            self::AREA_UPPER_RIGHT_ABSCISSA,
            self::AREA_UPPER_RIGHT_ORDINATE,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE,
            self::POSITION_CARDINAL
        );
    }

    public function testShouldCreateTheRequest(): void
    {
        $request = new CartesianCardinalCoordinateRoverExploreRequest(
            self::AREA_UPPER_RIGHT_ABSCISSA,
            self::AREA_UPPER_RIGHT_ORDINATE,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE,
            self::POSITION_CARDINAL
        );

        self::assertInstanceOf(
            CartesianCardinalCoordinateRoverExploreRequest::class,
            $request
        );

        self::assertInstanceOf(
            RoverExploreRequest::class,
            $request
        );
    }

    public function testShouldReturnTheAreaUpperRightAbscissa(): void
    {
        self::assertSame(
            self::AREA_UPPER_RIGHT_ABSCISSA,
            $this->roverExploreRequest->areaUpperRightAbscissa()
        );
    }

    public function testShouldReturnTheAreaUpperRightOrdinate(): void
    {
        self::assertSame(
            self::AREA_UPPER_RIGHT_ORDINATE,
            $this->roverExploreRequest->areaUpperRightOrdinate()
        );
    }

    public function testShouldReturnThePositionCardinal(): void
    {
        self::assertSame(
            self::POSITION_CARDINAL,
            $this->roverExploreRequest->positionCardinal()
        );
    }

    public function testShouldReturnThePositionAbscissa(): void
    {
        self::assertSame(
            self::POSITION_ABSCISSA,
            $this->roverExploreRequest->positionAbscissa()
        );
    }

    public function testShouldReturnThePositionOrdinate(): void
    {
        self::assertSame(
            self::POSITION_ORDINATE,
            $this->roverExploreRequest->positionOrdinate()
        );
    }
}
