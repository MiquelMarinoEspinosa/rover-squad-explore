<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Area\Cartesian\Rectangular;

use Throwable;
use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Area\InvalidArea;
use Core\Rover\Domain\Rover\Point\Cartesian\CartesianCoordinatePoint;
use Core\Rover\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianInvalidArea;

final class InvalidRectangularCartesianAreaTest extends TestCase
{
    private const INVALID_UPPER_RIGHT_ABSCISSA = -1;
    private const INVALID_UPPER_RIGHT_ORDINATE = self::INVALID_UPPER_RIGHT_ABSCISSA;

    public function testShouldCreateInvalidRectangularCartesianArea(): void
    {
        $rectangularCartesianInvalidArea = RectangularCartesianInvalidArea::create(
            CartesianCoordinatePoint::create(
                self::INVALID_UPPER_RIGHT_ABSCISSA,
                self::INVALID_UPPER_RIGHT_ORDINATE
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
