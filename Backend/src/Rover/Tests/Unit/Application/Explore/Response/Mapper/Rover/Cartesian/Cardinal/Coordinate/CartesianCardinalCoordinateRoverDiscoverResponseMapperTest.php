<?php

namespace Core\Rover\Tests\Unit\Application\Explore\Response\Mapper\Rover\Cartesian\Cardinal\Coordinate;

use Core\Rover\Application\Explore\Response\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverDiscoverResponseMapper;
use Core\Rover\Application\Explore\Response\Mapper\Rover\RoverDiscoverResponseMapper;
use Core\Rover\Application\Explore\Response\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverDiscoverResponse;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverPosition;
use PHPUnit\Framework\TestCase;

final class CartesianCardinalCoordinateRoverDiscoverResponseMapperTest extends TestCase
{
    private const CARDINAL = 'N';
    private const ABSCISSA = 1;
    private const ORDINATE = 2;

    public function testShouldCreateTheCartesianCardinalCoordinateRoverDiscoverResponseMapper(): void
    {
        $roverPosition = $this->givenRoverPosition();

        $mapper = new CartesianCardinalCoordinateRoverDiscoverResponseMapper(
            $roverPosition
        );

        self::assertInstanceOf(
            CartesianCardinalCoordinateRoverDiscoverResponseMapper::class,
            $mapper
        );

        self::assertInstanceOf(
            RoverDiscoverResponseMapper::class,
            $mapper
        );
    }

    public function testShouldMapTheRoverDiscoverResponse(): void
    {
        $roverPosition = $this->givenRoverPosition();

        $expectedResponse = $this->givenExpectedRoverDiscoverResponse();

        $mapper = new CartesianCardinalCoordinateRoverDiscoverResponseMapper(
            $roverPosition
        );

        self::assertEquals(
            $expectedResponse,
            $mapper->map()
        );
    }

    private function givenRoverPosition(): CartesianCardinalCoordinateRoverPosition
    {
        return new CartesianCardinalCoordinateRoverPosition(
            self::CARDINAL,
            self::ABSCISSA,
            self::ORDINATE
        );
    }

    private function givenExpectedRoverDiscoverResponse(): CartesianCardinalCoordinateRoverDiscoverResponse
    {
        return new CartesianCardinalCoordinateRoverDiscoverResponse(
            self::CARDINAL,
            self::ABSCISSA,
            self::ORDINATE
        );
    }
}