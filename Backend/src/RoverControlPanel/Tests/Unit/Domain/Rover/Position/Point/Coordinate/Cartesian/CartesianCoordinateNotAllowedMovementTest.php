<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point\Coordinate\Cartesian;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Cartesian\CartesianCoordinateNotAllowedMovement;
use PHPUnit\Framework\TestCase;

final class CartesianCoordinateNotAllowedMovementTest extends TestCase
{
    public function testShouldCreateTheCartesianCoodinateNotAllowedMovement(): void
    {
        $cartesianCoordinateNotAllowed = CartesianCoordinateNotAllowedMovement::create('movement');

        self::assertInstanceOf(
            CartesianCoordinateNotAllowedMovement::class,
            $cartesianCoordinateNotAllowed
        );
    }
}
