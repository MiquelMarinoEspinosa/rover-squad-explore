<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\Explore\Response\Rover\Cartesian\Cardinal\Coordinate;

use Core\Rover\Application\Explore\Response\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverDiscoverResponse;
use Core\Rover\Application\Explore\Response\Rover\RoverDiscoverResponse;
use PHPUnit\Framework\TestCase;

final class CartesianCardinalCoordinateRoverDiscoverResponseTest extends TestCase
{
    private const CARDINAL = 'N';
    private const ABSCISSA = 1;
    private const ORDINATE = 2;

    private CartesianCardinalCoordinateRoverDiscoverResponse $response;

    protected function setUp(): void
    {
        $this->response = new CartesianCardinalCoordinateRoverDiscoverResponse(
            self::CARDINAL,
            self::ABSCISSA,
            self::ORDINATE
        );
    }

    public function testShouldCreateTheCartesianCardinalCoordinateRoverDiscoverResponse(): void
    {
        $response = new CartesianCardinalCoordinateRoverDiscoverResponse(
            self::CARDINAL,
            self::ABSCISSA,
            self::ORDINATE
        );

        self::assertInstanceOf(
            CartesianCardinalCoordinateRoverDiscoverResponse::class,
            $response
        );

        self::assertInstanceOf(
            RoverDiscoverResponse::class,
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
