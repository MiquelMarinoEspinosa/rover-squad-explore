<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Direction\Cartesian\Cardinal;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Direction\Direction;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\SouthCardinalCartesianDirection;

final class SouthCardinalCartesianDirectionTest extends TestCase
{
    public function testShouldCreateSouthCardinalCartesianDirection(): void
    {
        $southCartesianCardinalDirection = new SouthCardinalCartesianDirection;

        self::assertInstanceOf(
            SouthCardinalCartesianDirection::class,
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
