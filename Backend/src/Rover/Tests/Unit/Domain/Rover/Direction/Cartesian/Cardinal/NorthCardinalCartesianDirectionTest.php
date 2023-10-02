<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Direction\Cartesian\Cardinal;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Direction\Direction;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\NorthCardinalCartesianDirection;

final class NorthCardinalCartesianDirectionTest extends TestCase
{
    public function testShouldCreateNorthCardinalCartesianDirection(): void
    {
        $northCartesianCardinalDirection = new NorthCardinalCartesianDirection();

        self::assertInstanceOf(
            NorthCardinalCartesianDirection::class,
            $northCartesianCardinalDirection
        );

        self::assertInstanceOf(
            CartesianCardinalDirection::class,
            $northCartesianCardinalDirection
        );

        self::assertInstanceOf(
            Direction::class,
            $northCartesianCardinalDirection
        );
    }
}
