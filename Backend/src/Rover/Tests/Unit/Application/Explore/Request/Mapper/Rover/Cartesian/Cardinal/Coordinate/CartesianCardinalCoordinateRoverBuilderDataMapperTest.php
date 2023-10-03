<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\Explore\Request\Mapper\Rover\Cartesian\Cardinal\Coordinate;

use PHPUnit\Framework\TestCase;
use Core\Rover\Application\Explore\Request\Mapper\Rover\RoverBuilderDataMapper;
use Core\Rover\Application\Explore\Request\Mapper\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilderDataMapper;
use Core\Rover\Application\Explore\Request\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverDiscoverRequest;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverBuilderData;

final class CartesianCardinalCoordinateRoverBuilderDataMapperTest extends TestCase
{
    private const AREA_UPPER_RIGHT_ABSCISSA = 5;
    private const AREA_UPPER_RIGHT_ORDINATE = 6;
    private const POSITION_CARDINAL         = 'N';
    private const POSITION_ABSCISSA         = 0;
    private const POSITION_ORDINATE         = 1;

    public function testCreateTheCartesianCardinalCoordinateRoverBuilderDataMapper(): void
    {
        $request = $this->givenRequest();

        $mapper = new CartesianCardinalCoordinateRoverBuilderDataMapper(
            $request
        );

        self::assertInstanceOf(
            CartesianCardinalCoordinateRoverBuilderDataMapper::class,
            $mapper
        );

        self::assertInstanceOf(
            RoverBuilderDataMapper::class,
            $mapper
        );
    }

    public function testShouldMapTheRoverBuilderData(): void
    {
        $request = $this->givenRequest();

        $expectedRoverBuilderData = $this->givenExpectedRoverBuilderData();

        $roverBuilderDataMapper = new CartesianCardinalCoordinateRoverBuilderDataMapper(
            $request
        );

        self::assertEquals(
            $expectedRoverBuilderData,
            $roverBuilderDataMapper->map()
        );
    }

    private function givenRequest(): CartesianCardinalCoordinateRoverDiscoverRequest
    {
        return new CartesianCardinalCoordinateRoverDiscoverRequest(
            self::AREA_UPPER_RIGHT_ABSCISSA,
            self::AREA_UPPER_RIGHT_ORDINATE,
            self::POSITION_CARDINAL,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE
        );
    }

    private function givenExpectedRoverBuilderData(): CartesianCardinalCoordinateRoverBuilderData
    {
        return new CartesianCardinalCoordinateRoverBuilderData(
            self::AREA_UPPER_RIGHT_ABSCISSA,
            self::AREA_UPPER_RIGHT_ORDINATE,
            self::POSITION_CARDINAL,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE
        );
    }
}
