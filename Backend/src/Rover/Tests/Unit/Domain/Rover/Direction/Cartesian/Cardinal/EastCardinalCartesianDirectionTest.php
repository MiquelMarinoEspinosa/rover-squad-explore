<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Direction\Cartesian\Cardinal;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Direction\Direction;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\EastCardinalCartesianDirection;

final class EastCardinalCartesianDirectionTest extends TestCase
{
    public function testShouldCreateEastCartesianCardinalDirection(): void
    {
        $eastCartesianCardinalDirection = new EastCardinalCartesianDirection();

        self::assertInstanceOf(
            EastCardinalCartesianDirection::class,
            $eastCartesianCardinalDirection
        );

        self::assertInstanceOf(
            CartesianCardinalDirection::class,
            $eastCartesianCardinalDirection
        );

        self::assertInstanceOf(
            Direction::class,
            $eastCartesianCardinalDirection
        );
    }
}
