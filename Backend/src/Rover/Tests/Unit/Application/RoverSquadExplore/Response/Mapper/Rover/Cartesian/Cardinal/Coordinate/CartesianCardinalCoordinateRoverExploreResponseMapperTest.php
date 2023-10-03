<?php

namespace Core\Rover\Tests\Unit\Application\RoverSquadExplore\Response\Mapper\Rover\Cartesian\Cardinal\Coordinate;

use Core\Rover\Application\RoverSquadExplore\Response\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreResponseMapper;
use Core\Rover\Application\RoverSquadExplore\Response\Mapper\Rover\RoverExploreResponseMapper;
use Core\Rover\Application\RoverSquadExplore\Response\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreResponse;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverPosition;
use PHPUnit\Framework\TestCase;

final class CartesianCardinalCoordinateRoverExploreResponseMapperTest extends TestCase
{
    private const CARDINAL = 'N';
    private const ABSCISSA = 1;
    private const ORDINATE = 2;

    public function testShouldCreateTheCartesianCardinalCoordinateRoverExploreResponseMapper(): void
    {
        $roverPosition = $this->givenRoverPosition();

        $mapper = new CartesianCardinalCoordinateRoverExploreResponseMapper(
            $roverPosition
        );

        self::assertInstanceOf(
            CartesianCardinalCoordinateRoverExploreResponseMapper::class,
            $mapper
        );

        self::assertInstanceOf(
            RoverExploreResponseMapper::class,
            $mapper
        );
    }

    public function testShouldMapTheRoverExploreResponse(): void
    {
        $roverPosition = $this->givenRoverPosition();

        $expectedResponse = $this->givenExpectedRoverExploreResponse();

        $mapper = new CartesianCardinalCoordinateRoverExploreResponseMapper(
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

    private function givenExpectedRoverExploreResponse(): CartesianCardinalCoordinateRoverExploreResponse
    {
        return new CartesianCardinalCoordinateRoverExploreResponse(
            self::CARDINAL,
            self::ABSCISSA,
            self::ORDINATE
        );
    }
}