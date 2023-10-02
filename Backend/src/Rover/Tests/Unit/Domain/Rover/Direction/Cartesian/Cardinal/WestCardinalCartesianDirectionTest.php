<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Direction\Cartesian\Cardinal;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Direction\Direction;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\WestCardinalCartesianDirection;

final class WestCardinalCartesianDirectionTest extends TestCase
{
    public function testShouldCreateWestCardinalCartesianDirection(): void
    {
        $southCartesianCardinalDirection = new WestCardinalCartesianDirection;

        self::assertInstanceOf(
            WestCardinalCartesianDirection::class,
            $southCartesianCardinalDirection
        );

        self::assertInstanceOf(
            CartesianCardinalDirection::class,
            $southCartesianCardinalDirection
        );

        self::assertInstanceOf(
            Direction::class,
            $southCartesianCardinalDirection
        );
    }
}
