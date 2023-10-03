<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\RoverSquadExplore\Request\Rover\Cartesian\Cardinal\Coordinate;

use Core\Rover\Application\RoverSquadExplore\Request\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverDiscoverRequest;
use Core\Rover\Application\RoverSquadExplore\Request\Rover\RoverDiscoverRequest;
use PHPUnit\Framework\TestCase;

final class CartesianCardinalCoordinateRoverDiscoverRequestTest extends TestCase
{
    private const AREA_UPPER_RIGHT_ABSCISSA = 5;
    private const AREA_UPPER_RIGHT_ORDINATE = 6;
    private const POSITION_CARDINAL         = 'N';
    private const POSITION_ABSCISSA         = 0;
    private const POSITION_ORDINATE         = 1;

    private CartesianCardinalCoordinateRoverDiscoverRequest $roverDiscoverRequest;

    protected function setUp(): void 
    {
        $this->roverDiscoverRequest = new CartesianCardinalCoordinateRoverDiscoverRequest(
            self::AREA_UPPER_RIGHT_ABSCISSA,
            self::AREA_UPPER_RIGHT_ORDINATE,
            self::POSITION_CARDINAL,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE
        );
    }

    public function testShouldCreateTheRequest(): void
    {
        $request = new CartesianCardinalCoordinateRoverDiscoverRequest(
            self::AREA_UPPER_RIGHT_ABSCISSA,
            self::AREA_UPPER_RIGHT_ORDINATE,
            self::POSITION_CARDINAL,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE
        );

        self::assertInstanceOf(
            CartesianCardinalCoordinateRoverDiscoverRequest::class,
            $request
        );

        self::assertInstanceOf(
            RoverDiscoverRequest::class,
            $request
        );
    }

    public function testShouldReturnTheAreaUpperRightAbscissa(): void
    {
        self::assertSame(
            self::AREA_UPPER_RIGHT_ABSCISSA,
            $this->roverDiscoverRequest->areaUpperRightAbscissa()
        );
    }

    public function testShouldReturnTheAreaUpperRightOrdinate(): void
    {
        self::assertSame(
            self::AREA_UPPER_RIGHT_ORDINATE,
            $this->roverDiscoverRequest->areaUpperRightOrdinate()
        );
    }

    public function testShouldReturnThePositionCardinal(): void
    {
        self::assertSame(
            self::POSITION_CARDINAL,
            $this->roverDiscoverRequest->positionCardinal()
        );
    }

    public function testShouldReturnThePositionAbscissa(): void
    {
        self::assertSame(
            self::POSITION_ABSCISSA,
            $this->roverDiscoverRequest->positionAbscissa()
        );
    }

    public function testShouldReturnThePositionOrdinate(): void
    {
        self::assertSame(
            self::POSITION_ORDINATE,
            $this->roverDiscoverRequest->positionOrdinate()
        );
    }
}
