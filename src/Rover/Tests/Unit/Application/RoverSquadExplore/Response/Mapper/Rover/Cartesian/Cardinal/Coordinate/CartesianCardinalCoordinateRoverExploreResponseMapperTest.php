<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\RoverSquadExplore\Response\Mapper\Rover\Cartesian\Cardinal\Coordinate;

use PHPUnit\Framework\TestCase;
use Core\Rover\Application\RoverSquadExplore\Response\Mapper\Rover\RoverExploreResponseMapper;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverPosition;
use Core\Rover\Application\RoverSquadExplore\Response\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreResponse;
use Core\Rover\Application\RoverSquadExplore\Response\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreResponseMapper;

final class CartesianCardinalCoordinateRoverExploreResponseMapperTest extends TestCase
{
    private const ABSCISSA = 1;
    private const ORDINATE = 2;
    private const CARDINAL = 'N';

    public function testShouldCreateTheCartesianCardinalCoordinateRoverExploreResponseMapper(): void
    {
        $mapper = new CartesianCardinalCoordinateRoverExploreResponseMapper;

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

        $mapper = new CartesianCardinalCoordinateRoverExploreResponseMapper;

        self::assertEquals(
            $expectedResponse,
            $mapper->map($roverPosition)
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
            self::ABSCISSA,
            self::ORDINATE,
            self::CARDINAL
        );
    }
}