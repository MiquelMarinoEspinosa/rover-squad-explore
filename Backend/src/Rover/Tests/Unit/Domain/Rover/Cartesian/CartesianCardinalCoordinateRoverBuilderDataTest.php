<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Cartesian\CartesianRoverBuilderData;
use Core\Rover\Domain\Rover\Cartesian\CartesianCardinalCoordinateRoverBuilderData;

final class CartesianCardinalCoordinateRoverBuilderDataTest extends TestCase
{
    public function testShouldCreateTheCartesianCardinalCoordinateRoverBuilderData(): void
    {
        $cartesianCardinalCoordinateRoverBuilderData = new CartesianCardinalCoordinateRoverBuilderData();

        self::assertInstanceOf(
            CartesianCardinalCoordinateRoverBuilderData::class,
            $cartesianCardinalCoordinateRoverBuilderData
        );

        self::assertInstanceOf(
            CartesianRoverBuilderData::class,
            $cartesianCardinalCoordinateRoverBuilderData
        );
    }
}
