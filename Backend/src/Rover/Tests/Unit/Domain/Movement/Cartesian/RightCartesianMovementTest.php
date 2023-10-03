<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Movement\Cartesian;

use Core\Rover\Domain\Collection\CollectionItem;
use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Movement\Movement;
use Core\Rover\Domain\Rover\Area\Cartesian\CartesianArea;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovement;
use Core\Rover\Domain\Movement\Cartesian\RightCartesianMovement;
use Core\Rover\Domain\Rover\Cartesian\CartesianCardinalCoordinateRover;
use Core\Rover\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianArea;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\EastCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\WestCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\NorthCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\SouthCardinalCartesianDirection;

final class RightCartesianMovementTest extends TestCase
{
    private const POSITION_ABSCISSA         = 0;
    private const POSITION_ORDINATE         = 1;
    private const AREA_UPPER_RIGHT_ABSCISSA = 5;
    private const AREA_UPPER_RIGHT_ORDINATE = self::AREA_UPPER_RIGHT_ABSCISSA;

    public function testShouldCreateTheRightCartesianMovement(): void
    {
        $rightCartesianMovement = new RightCartesianMovement;

        self::assertInstanceOf(
            RightCartesianMovement::class,
            $rightCartesianMovement
        );

        self::assertInstanceOf(
            CartesianMovement::class,
            $rightCartesianMovement
        );

        self::assertInstanceOf(
            Movement::class,
            $rightCartesianMovement
        );

        self::assertInstanceOf(
            CollectionItem::class,
            $rightCartesianMovement
        );
    }

    /**
     * @dataProvider cardinalDirectionMovementProvider
     */
    public function testShouldApply(
        CartesianCardinalDirection $cartesianCardinalDirection,
        CartesianCardinalDirection $expectedCardinalDirection,
    ): void {
        $rightCartesianMovement = new RightCartesianMovement;

        $cartesianCardinalCoordinateRover = $this->givenCartesianRover(
            $cartesianCardinalDirection
        );

        $cartesianCardinalCoordinateRover = $this->whenApplyMovement(
            $cartesianCardinalCoordinateRover,
            $rightCartesianMovement
        );

        $this->thenShouldHaveBeenMovedRight(
            $cartesianCardinalCoordinateRover,
            $expectedCardinalDirection,
            self::POSITION_ABSCISSA,
            self::POSITION_ORDINATE
        );
    }

    public static function cardinalDirectionMovementProvider(): array
    {
        return [
            'east-south' => [
                new EastCardinalCartesianDirection,
                new SouthCardinalCartesianDirection
            ],
            'north-east' => [
                new NorthCardinalCartesianDirection,
                new EastCardinalCartesianDirection
            ],
            'south-west' => [
                new SouthCardinalCartesianDirection,
                new WestCardinalCartesianDirection
            ],
            'west-north' => [
                new WestCardinalCartesianDirection,
                new NorthCardinalCartesianDirection
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
        RightCartesianMovement $rightCartesianMovement
    ): CartesianCardinalCoordinateRover {

        return $rightCartesianMovement->apply(
            $cartesianCardinalCoordinateRover
        );
    }

    private function thenShouldHaveBeenMovedRight(
        CartesianCardinalCoordinateRover $cartesianCardinalCoordinateRover,
        CartesianCardinalDirection $expectedCardinalDirection,
        int $expectedPositionAbscissa,
        int $expectedPositionOrdinate  
    ): void {
        $cartesianCardinalCoordinateRoverPosition = $cartesianCardinalCoordinateRover
            ->position();

        self::assertSame(
            $expectedCardinalDirection->value(),
            $cartesianCardinalCoordinateRoverPosition->cardinal()
        );

        self::assertSame(
            $expectedPositionAbscissa,
            $cartesianCardinalCoordinateRoverPosition->abscissa()
        );

        self::assertSame(
            $expectedPositionOrdinate,
            $cartesianCardinalCoordinateRoverPosition->ordinate()
        );
    }
}
