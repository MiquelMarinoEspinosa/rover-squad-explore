<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Cartesian;

use Core\Rover\Domain\Rover\Area\Cartesian\CartesianAreaBuilder;
use Core\Rover\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianArea;
use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\RoverBuilder;
use Core\Rover\Domain\Rover\Cartesian\CartesianRoverBuilder;
use Core\Rover\Domain\Rover\Cartesian\CartesianCardinalCoordinateRoverBuilder;
use Core\Rover\Domain\Rover\Cartesian\CartesianCardinalCoordinateRoverBuilderData;
use Core\Rover\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianAreaBuilder;
use Core\Rover\Domain\Rover\Cartesian\CartesianCardinalCoordinateRover;
use Core\Rover\Domain\Rover\Cartesian\CartesianRover;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirectionFactory;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\NorthCardinalCartesianDirection;

final class CartesianCardinalCoordinateRoverBuilderTest extends TestCase
{
    private const AREA_UPPER_RIGHT_ABSCISSA = 5;
    private const AREA_UPPER_RIGHT_ORDINATE = 6;
    private const POSITION_CARDINAL         = 'N';
    private const POSITION_ABSCISSA         = 0;
    private const POSITION_ORDINATE         = 1;

    public function testShouldCreateCartesianCardinalCoordinateRoverBuilder(): void
    {
        $areaBuilder = $this->givenAreBuilder();

        $directionFactory = $this->givenDirectionFactory();

        $cartesianCardinalCoordinateRoverBuilder = new CartesianCardinalCoordinateRoverBuilder(
            $areaBuilder,
            $directionFactory
        );

        self::assertInstanceOf(
            CartesianCardinalCoordinateRoverBuilder::class,
            $cartesianCardinalCoordinateRoverBuilder
        );

        self::assertInstanceOf(
            CartesianRoverBuilder::class,
            $cartesianCardinalCoordinateRoverBuilder
        );

        self::assertInstanceOf(
            RoverBuilder::class,
            $cartesianCardinalCoordinateRoverBuilder
        );
    }

    public function testShouldBuildTheCartesianRover(): void
    {
        $data = $this->givenData();

        $areBuilder = $this->givenAreBuilder();

        $directionFactory = $this->givenDirectionFactory();

        $roverBuilder = $this->givenRoverBuilder(
            $areBuilder,
            $directionFactory
        );

        $rover = $this->whenBuildTheRover(
            $roverBuilder,
            $data
        );

        $this->thenShouldHaveBeenBuiltTheRover($rover);
    }

    public function givenData(): CartesianCardinalCoordinateRoverBuilderData
    {
        return new CartesianCardinalCoordinateRoverBuilderData(
            self::AREA_UPPER_RIGHT_ABSCISSA,
            self::AREA_UPPER_RIGHT_ORDINATE,
            self::POSITION_CARDINAL,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE
        );
    }

    private function givenAreBuilder(): RectangularCartesianAreaBuilder
    {
        return RectangularCartesianAreaBuilder::getInstance();
    }

    private function givenDirectionFactory(): CartesianCardinalDirectionFactory
    {
        return CartesianCardinalDirectionFactory::getInstance();
    }

    private function givenRoverBuilder(
        CartesianAreaBuilder $areBuilder,
        CartesianCardinalDirectionFactory $directionFactory
    ): CartesianCardinalCoordinateRoverBuilder {

        return new CartesianCardinalCoordinateRoverBuilder(
            $areBuilder,
            $directionFactory
        );
    }

    private function whenBuildTheRover(
        CartesianCardinalCoordinateRoverBuilder $roverBuilder,
        CartesianCardinalCoordinateRoverBuilderData $data
    ): CartesianRover {

        return $roverBuilder->build($data);
    }

    private function thenShouldHaveBeenBuiltTheRover(
        CartesianCardinalCoordinateRover $rover
    ): void {
        $area = RectangularCartesianArea::createWithUpperRightCoordinates(
            self::AREA_UPPER_RIGHT_ABSCISSA,
            self::AREA_UPPER_RIGHT_ORDINATE
        );

        $expectedRover = CartesianCardinalCoordinateRover::create(
            $area,
            new NorthCardinalCartesianDirection,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE
        );

        self::assertEquals(
            $expectedRover,
            $rover
        );
    }
}
