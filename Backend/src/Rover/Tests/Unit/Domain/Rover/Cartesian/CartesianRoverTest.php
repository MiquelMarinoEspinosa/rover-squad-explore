<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Area\Cartesian\CartesianArea;
use Core\Rover\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianArea;
use Core\Rover\Domain\Rover\Cartesian\CartesianRover;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\NorthCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Rover;

final class CartesianRoverTest extends TestCase
{
    private const AREA_UPPER_RIGHT_ABSCISSA = 5;
    private const AREA_UPPER_RIGHT_ORDINATE = self::AREA_UPPER_RIGHT_ABSCISSA;

    public function testShouldCreateCartesianRover(): void
    {
        $area = $this->givenArea();

        $direction = $this->givenDirection();

        $cartesianRover = CartesianRover::create(
            $area,
            $direction,
            1,
            1
        );

        self::assertInstanceOf(
            CartesianRover::class,
            $cartesianRover
        );

        self::assertInstanceOf(
            Rover::class,
            $cartesianRover
        );
    }

    private function givenArea(): CartesianArea
    {
        return RectangularCartesianArea::createWithUpperRightCoordinates(
            self::AREA_UPPER_RIGHT_ABSCISSA,
            self::AREA_UPPER_RIGHT_ORDINATE
        );
    }

    private function givenDirection(): CartesianCardinalDirection
    {
        return new NorthCardinalCartesianDirection;
    }
}
