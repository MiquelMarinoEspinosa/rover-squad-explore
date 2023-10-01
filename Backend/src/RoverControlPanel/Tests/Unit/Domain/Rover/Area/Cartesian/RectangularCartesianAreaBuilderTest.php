<?php

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Area\Cartesian;

use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\CartesianAreaBuilder;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\RectangularCartesianAreaBuilder;
use PHPUnit\Framework\TestCase;

final class RectangularCartesianAreaBuilderTest extends TestCase
{
    public function testShouldInstanciateTheRectangularCartesianAreaBuilder(): void
    {
        $rectangularCartesianAreaBuilder = RectangularCartesianAreaBuilder::getInstance();

        self::assertInstanceOf(
            RectangularCartesianAreaBuilder::class,
            $rectangularCartesianAreaBuilder
        );

        self::assertInstanceOf(
            CartesianAreaBuilder::class,
            $rectangularCartesianAreaBuilder
        );
    }
}
