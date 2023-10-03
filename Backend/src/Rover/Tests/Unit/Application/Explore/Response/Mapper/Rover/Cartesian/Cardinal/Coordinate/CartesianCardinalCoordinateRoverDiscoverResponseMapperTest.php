<?php

namespace Core\Rover\Tests\Unit\Application\Explore\Response\Mapper\Rover\Cartesian\Cardinal\Coordinate;

use Core\Rover\Application\Explore\Response\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverDiscoverResponseMapper;
use Core\Rover\Application\Explore\Response\Mapper\Rover\RoverDiscoverResponseMapper;
use PHPUnit\Framework\TestCase;

final class CartesianCardinalCoordinateRoverDiscoverResponseMapperTest extends TestCase
{
    public function testShouldCreateTheCartesianCardinalCoordinateRoverDiscoverResponseMapper(): void
    {
        $mapper = new CartesianCardinalCoordinateRoverDiscoverResponseMapper;

        self::assertInstanceOf(
            CartesianCardinalCoordinateRoverDiscoverResponseMapper::class,
            $mapper
        );

        self::assertInstanceOf(
            RoverDiscoverResponseMapper::class,
            $mapper
        );
    }   
}