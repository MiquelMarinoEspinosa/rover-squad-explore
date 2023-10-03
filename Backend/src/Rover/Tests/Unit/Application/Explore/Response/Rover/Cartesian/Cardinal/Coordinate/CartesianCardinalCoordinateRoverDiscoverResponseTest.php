<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\Explore\Response\Rover\Cartesian\Cardinal\Coordinate;

use Core\Rover\Application\Explore\Response\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverDiscoverResponse;
use Core\Rover\Application\Explore\Response\Rover\RoverDiscoverResponse;
use PHPUnit\Framework\TestCase;

final class CartesianCardinalCoordinateRoverDiscoverResponseTest extends TestCase
{
    public function testShouldCreateTheCartesianCardinalCoordinateRoverDiscoverResponse(): void
    {
        $response = new CartesianCardinalCoordinateRoverDiscoverResponse;

        self::assertInstanceOf(
            CartesianCardinalCoordinateRoverDiscoverResponse::class,
            $response
        );

        self::assertInstanceOf(
            RoverDiscoverResponse::class,
            $response
        );
    }
}
