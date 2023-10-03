<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\RoverSquadExplore\Response\Rover\Cartesian\Cardinal\Coordinate;

use Core\Rover\Application\RoverSquadExplore\Response\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreResponse;
use Core\Rover\Application\RoverSquadExplore\Response\Rover\RoverExploreResponse;
use PHPUnit\Framework\TestCase;

final class CartesianCardinalCoordinateRoverExploreResponseTest extends TestCase
{
    private const CARDINAL = 'N';
    private const ABSCISSA = 1;
    private const ORDINATE = 2;

    private CartesianCardinalCoordinateRoverExploreResponse $response;

    protected function setUp(): void
    {
        $this->response = new CartesianCardinalCoordinateRoverExploreResponse(
            self::CARDINAL,
            self::ABSCISSA,
            self::ORDINATE
        );
    }

    public function testShouldCreateTheCartesianCardinalCoordinateRoverExploreResponse(): void
    {
        $response = new CartesianCardinalCoordinateRoverExploreResponse(
            self::CARDINAL,
            self::ABSCISSA,
            self::ORDINATE
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
