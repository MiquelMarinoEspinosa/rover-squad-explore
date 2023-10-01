<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Area\Cartesian\Rectangular;

use Throwable;
use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Area\InvalidArea;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianInvalidArea;

final class InvalidRectangularCartesianAreaTest extends TestCase
{
    public function testShouldCreateInvalidRectangularCartesianArea(): void
    {
        $rectangularCartesianInvalidArea = RectangularCartesianInvalidArea::create();

        self::assertInstanceOf(
            RectangularCartesianInvalidArea::class,
            $rectangularCartesianInvalidArea
        );

        self::assertInstanceOf(
            InvalidArea::class,
            $rectangularCartesianInvalidArea
        );

        self::assertInstanceOf(
            Throwable::class,
            $rectangularCartesianInvalidArea
        );
    }
}
