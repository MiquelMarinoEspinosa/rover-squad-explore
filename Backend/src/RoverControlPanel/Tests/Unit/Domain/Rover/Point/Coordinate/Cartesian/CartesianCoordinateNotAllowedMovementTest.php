<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Point\Coordinate\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Point\Coordinate\CoordinateNotAllowedMovement;
use Core\RoverControlPanel\Domain\Rover\Point\Coordinate\Cartesian\CartesianCoordinateNotAllowedMovement;

final class CartesianCoordinateNotAllowedMovementTest extends TestCase
{
    public function testShouldCreateTheCartesianCoodinateNotAllowedMovement(): void
    {
        $cartesianCoordinateNotAllowed = CartesianCoordinateNotAllowedMovement::create('movement');

        self::assertInstanceOf(
            CartesianCoordinateNotAllowedMovement::class,
            $cartesianCoordinateNotAllowed
        );

        self::assertInstanceOf(
            CoordinateNotAllowedMovement::class,
            $cartesianCoordinateNotAllowed
        );
    }
}
