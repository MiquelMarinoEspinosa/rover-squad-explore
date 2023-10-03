<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Cartesian\CartesianRoverBuilder;
use Core\Rover\Domain\Rover\Cartesian\CartesianCardinalCoordinateRoverBuilder;
use Core\Rover\Domain\Rover\RoverBuilder;

final class CartesianCardinalCoordinateRoverBuilderTest extends TestCase
{
    public function testShouldInstantiateCartesianCardinalCoordinateRoverBuilder(): void
    {
        $cartesianCardinalCoordinateRoverBuilder = CartesianCardinalCoordinateRoverBuilder::getInstance();

        self::assertInstanceOf(
            CartesianCardinalCoordinateRoverBuilder::class,
            $cartesianCardinalCoordinateRoverBuilder
        );

        self::assertInstanceOf(
            CartesianRoverBuilder::class,
            $cartesianCardinalCoordinateRoverBuilder
        );

        self::assertInstanceOf(
            RoverBuilder::class,
            $cartesianCardinalCoordinateRoverBuilder
        );
    }

    public function testShouldBeTheSameInstanceWhenInstantiateTwice(): void
    {
        self::assertSame(
            CartesianCardinalCoordinateRoverBuilder::getInstance(),
            CartesianCardinalCoordinateRoverBuilder::getInstance()
        );
    }
}
