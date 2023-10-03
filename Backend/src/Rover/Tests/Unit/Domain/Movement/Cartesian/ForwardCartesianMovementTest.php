<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Movement\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Movement\Movement;
use Core\Rover\Domain\Collection\CollectionItem;
use Core\Rover\Domain\Rover\Area\Cartesian\CartesianArea;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovement;
use Core\Rover\Domain\Movement\Cartesian\ForwardCartesianMovement;
use Core\Rover\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianArea;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\EastCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\WestCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\NorthCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\SouthCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRover;

final class ForwardCartesianMovementTest extends TestCase
{
    private const POSITION_ABSCISSA         = 1;
    private const POSITION_ORDINATE         = 2;
    private const AREA_UPPER_RIGHT_ABSCISSA = 5;
    private const AREA_UPPER_RIGHT_ORDINATE = self::AREA_UPPER_RIGHT_ABSCISSA;

    public function testShouldCreateTheForwardCartesianMovement(): void
    {
        $forwardCartesianMovement = new ForwardCartesianMovement;

        self::assertInstanceOf(
            ForwardCartesianMovement::class,
            $forwardCartesianMovement
        );

        self::assertInstanceOf(
            CartesianMovement::class,
            $forwardCartesianMovement
        );

        self::assertInstanceOf(
            Movement::class,
            $forwardCartesianMovement
        );
    }

    /**
     * @dataProvider cardinalDirectionApplyMovementProvider
     */
    public function testShouldApplyTheMovement(
        CartesianCardinalDirection $cartesianCardinalDirection,
        int $expectedPositionAbscissa,
        int $expectedPositionOrdinate,
    ): void {
        $forwardCartesianMovement = new ForwardCartesianMovement;

        $cartesianCardinalCoordinateRover = $this->givenCartesianRover(
            $cartesianCardinalDirection
        );

        $cartesianCardinalCoordinateRover = $this->whenApplyMovement(
            $cartesianCardinalCoordinateRover,
            $forwardCartesianMovement
        );

        $this->thenShouldHaveBeenMovedForward(
            $cartesianCardinalCoordinateRover,
            $cartesianCardinalDirection,
            $expectedPositionAbscissa,
            $expectedPositionOrdinate
        );
    }

    public static function cardinalDirectionApplyMovementProvider(): array
    {
        return [
            'east-right' => [
                new EastCardinalCartesianDirection,
                self::POSITION_ABSCISSA + 1,
                self::POSITION_ORDINATE
            ],
            'north-up'   => [
                new NorthCardinalCartesianDirection,
                self::POSITION_ABSCISSA,
                self::POSITION_ORDINATE + 1
            ],
            'south-down' => [
                new SouthCardinalCartesianDirection,
                self::POSITION_ABSCISSA,
                self::POSITION_ORDINATE - 1
            ],
            'west-left'  => [
                new WestCardinalCartesianDirection,
                self::POSITION_ABSCISSA - 1,
                self::POSITION_ORDINATE
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
        ForwardCartesianMovement $forwardCartesianMovement
    ): CartesianCardinalCoordinateRover {

        return $forwardCartesianMovement->apply(
            $cartesianCardinalCoordinateRover
        );
    }

    private function thenShouldHaveBeenMovedForward(
        CartesianCardinalCoordinateRover $cartesianCardinalCoordinateRover,
        CartesianCardinalDirection $cartesianCardinalDirection,
        int $expectedPositionAbscissa,
        int $expectedPositionOrdinate,
    ): void {
        $cartesianCardinalCoordinateRoverPosition = $cartesianCardinalCoordinateRover
            ->position();

        self::assertSame(
            $cartesianCardinalDirection->value(),
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
