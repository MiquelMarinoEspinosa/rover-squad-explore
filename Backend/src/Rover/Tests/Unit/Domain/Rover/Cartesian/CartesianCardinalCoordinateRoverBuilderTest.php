<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Cartesian\CartesianRoverBuilder;
use Core\Rover\Domain\Rover\Cartesian\CartesianCardinalCoordinateRoverBuilder;

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
    }
}