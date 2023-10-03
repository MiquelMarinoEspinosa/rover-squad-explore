<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\Explore\Request\Rover\Cartesian\Cardinal\Coordinate;

use Core\Rover\Application\Explore\Request\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverDiscoverRequest;
use Core\Rover\Application\Explore\Request\Rover\RoverDiscoverRequest;
use PHPUnit\Framework\TestCase;

final class CartesianCardinalCoordinateRoverDiscoverRequestTest extends TestCase
{
    public function testShouldCreateTheRequest(): void
    {
        $request = new CartesianCardinalCoordinateRoverDiscoverRequest;

        self::assertInstanceOf(
            CartesianCardinalCoordinateRoverDiscoverRequest::class,
            $request
        );

        self::assertInstanceOf(
            RoverDiscoverRequest::class,
            $request
        );
    }
}
