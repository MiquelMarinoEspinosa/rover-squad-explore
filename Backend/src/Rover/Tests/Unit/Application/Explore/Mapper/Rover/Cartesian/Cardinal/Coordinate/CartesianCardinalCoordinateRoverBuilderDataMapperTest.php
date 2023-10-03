<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\Explore\Mapper\Rover\Cartesian\Cardinal\Coordinate;

use PHPUnit\Framework\TestCase;
use Core\Rover\Application\Explore\Mapper\Rover\RoverBuilderDataMapper;
use Core\Rover\Application\Explore\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilderDataMapper;

final class CartesianCardinalCoordinateRoverBuilderDataMapperTest extends TestCase
{
    public function testCreateTheCartesianCardinalCoordinateRoverBuilderDataMapper(): void
    {
        $mapper = new CartesianCardinalCoordinateRoverBuilderDataMapper;

        self::assertInstanceOf(
            CartesianCardinalCoordinateRoverBuilderDataMapper::class,
            $mapper
        );

        self::assertInstanceOf(
            RoverBuilderDataMapper::class,
            $mapper
        );
    }
}
