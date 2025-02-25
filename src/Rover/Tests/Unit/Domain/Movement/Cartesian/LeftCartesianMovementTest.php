<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Movement\Cartesian;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Movement\Movement;
use Core\Rover\Domain\Rover\Area\Cartesian\CartesianArea;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovement;
use Core\Rover\Domain\Movement\Cartesian\LeftCartesianMovement;
use Core\Rover\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianArea;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\EastCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\WestCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\NorthCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\SouthCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRover;

final class LeftCartesianMovementTest extends TestCase
{
    private const POSITION_ABSCISSA         = 0;
    private const POSITION_ORDINATE         = 1;
    private const AREA_UPPER_RIGHT_ABSCISSA = 5;
    private const AREA_UPPER_RIGHT_ORDINATE = self::AREA_UPPER_RIGHT_ABSCISSA;

    public function testShouldCreateTheLeftCartesianMovement(): void
    {
        $leftCartesianMovement = new LeftCartesianMovement;

        self::assertInstanceOf(
            LeftCartesianMovement::class,
            $leftCartesianMovement
        );

        self::assertInstanceOf(
            CartesianMovement::class,
            $leftCartesianMovement
        );

        self::assertInstanceOf(
            Movement::class,
            $leftCartesianMovement
        );
    }

    #[DataProvider('cardinalDirectionMovementProvider')]
    public function testShouldApply(
        CartesianCardinalDirection $cartesianCardinalDirection,
        CartesianCardinalDirection $expectedCardinalDirection,
    ): void {
        $leftCartesianMovement = new LeftCartesianMovement;

        $cartesianCardinalCoordinateRover = $this->givenCartesianRover(
            $cartesianCardinalDirection
        );

        $cartesianCardinalCoordinateRover = $this->whenApplyMovement(
            $cartesianCardinalCoordinateRover,
            $leftCartesianMovement
        );

        $this->thenShouldHaveBeenMovedLeft(
            $cartesianCardinalCoordinateRover,
            $expectedCardinalDirection,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE
        );
    }

    public static function cardinalDirectionMovementProvider(): array
    {
        return [
            'east-north' => [
                new EastCardinalCartesianDirection,
                new NorthCardinalCartesianDirection
            ],
            'north-west' => [
                new NorthCardinalCartesianDirection,
                new WestCardinalCartesianDirection
            ],
            'south-east' => [
                new SouthCardinalCartesianDirection,
                new EastCardinalCartesianDirection
            ],
            'west-south' => [
                new WestCardinalCartesianDirection,
                new SouthCardinalCartesianDirection
            ]
        ];
    }

    private function givenCartesianRover(
        CartesianCardinalDirection $cartesianCardinalDirection
    ): CartesianCardinalCoordinateRover {
        $cartesianArea = $this->givenCartesianArea();

        return CartesianCardinalCoordinateRover::create(
            $cartesianArea,
            $cartesianCardinalDirection,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE
        );
    }

    private function givenCartesianArea(): CartesianArea
    {
        return RectangularCartesianArea::createWithUpperRightCoordinates(
            self::AREA_UPPER_RIGHT_ABSCISSA,
            self::AREA_UPPER_RIGHT_ORDINATE
        );
    }

    private function whenApplyMovement(
        CartesianCardinalCoordinateRover $cartesianCardinalCoordinateRover,
        LeftCartesianMovement $leftCartesianMovement
    ): CartesianCardinalCoordinateRover {

        return $leftCartesianMovement->apply(
            $cartesianCardinalCoordinateRover
        );
    }

    private function thenShouldHaveBeenMovedLeft(
        CartesianCardinalCoordinateRover $cartesianCardinalCoordinateRover,
        CartesianCardinalDirection $expectedCardinalDirection,
        int $expectedAbscissa,
        int $expectedOrdinate
    ): void {
        $cartesianCardinalCoordinateRoverPosition = $cartesianCardinalCoordinateRover->position();

        self::assertSame(
            $expectedCardinalDirection->value(),
            $cartesianCardinalCoordinateRoverPosition->cardinal()
        );

        self::assertSame(
            $expectedAbscissa,
            $cartesianCardinalCoordinateRoverPosition->abscissa()
        );

        self::assertSame(
            $expectedOrdinate,
            $cartesianCardinalCoordinateRoverPosition->ordinate()
        );
    }
}
