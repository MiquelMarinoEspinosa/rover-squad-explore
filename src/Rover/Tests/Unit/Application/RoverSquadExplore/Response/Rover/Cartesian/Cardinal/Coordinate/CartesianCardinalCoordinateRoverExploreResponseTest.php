<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\RoverSquadExplore\Response\Rover\Cartesian\Cardinal\Coordinate;

use PHPUnit\Framework\TestCase;
use Core\Rover\Application\RoverSquadExplore\Response\Rover\RoverExploreResponse;
use Core\Rover\Application\RoverSquadExplore\Response\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreResponse;

final class CartesianCardinalCoordinateRoverExploreResponseTest extends TestCase
{
    private const ABSCISSA = 1;
    private const ORDINATE = 2;
    private const CARDINAL = 'N';

    private CartesianCardinalCoordinateRoverExploreResponse $response;

    protected function setUp(): void
    {
        $this->response = new CartesianCardinalCoordinateRoverExploreResponse(
            self::ABSCISSA,
            self::ORDINATE,
            self::CARDINAL
        );
    }

    public function testShouldCreateTheCartesianCardinalCoordinateRoverExploreResponse(): void
    {
        $response = new CartesianCardinalCoordinateRoverExploreResponse(
            self::ABSCISSA,
            self::ORDINATE,
            self::CARDINAL
        );

        self::assertInstanceOf(
            CartesianCardinalCoordinateRoverExploreResponse::class,
            $response
        );

        self::assertInstanceOf(
            RoverExploreResponse::class,
            $response
        );
    }

    public function testShouldReturnTheCardinal(): void
    {
        self::assertSame(
            self::CARDINAL,
            $this->response->cardinal()
        );
    }

    public function testShouldReturnTheAbscissa(): void
    {
        self::assertSame(
            self::ABSCISSA,
            $this->response->abscissa()
        );
    }

    public function testShouldReturnTheOrdinate(): void
    {
        self::assertSame(
            self::ORDINATE,
            $this->response->ordinate()
        );
    }
}
