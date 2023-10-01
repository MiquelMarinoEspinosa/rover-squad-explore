<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Area\Cartesian\Rectangular;

use Throwable;
use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Area\InvalidArea;
use Core\RoverControlPanel\Domain\Rover\Point\Cartesian\CartesianCoordinatePoint;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianInvalidArea;

final class InvalidRectangularCartesianAreaTest extends TestCase
{
    private const INVALID_UPPER_RIGHT_ABSCISSA = -1;
    private const INVALID_UPPER_RIGHT_ORDINADA = self::INVALID_UPPER_RIGHT_ABSCISSA;

    public function testShouldCreateInvalidRectangularCartesianArea(): void
    {
        $rectangularCartesianInvalidArea = RectangularCartesianInvalidArea::create(
            CartesianCoordinatePoint::create(
                self::INVALID_UPPER_RIGHT_ABSCISSA,
                self::INVALID_UPPER_RIGHT_ORDINADA
            )
        );

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
