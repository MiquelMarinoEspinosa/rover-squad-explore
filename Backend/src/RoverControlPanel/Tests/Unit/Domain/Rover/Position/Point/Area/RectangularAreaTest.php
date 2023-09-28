<?php

declare(strict_types=1);

namespace Core\Tests\Unit\Domain\Rover\Position\Point\Area;

use Core\RoverControlPanel\Domain\Rover\Position\Point\Area\Area;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Area\RectangularArea;
use PHPUnit\Framework\TestCase;

final class RectangularAreaTest extends TestCase
{
    public function testShouldCreateTheArea(): void
    {
        $map = RectangularArea::create(
            0,
            0,
            5,
            5
        );

        self::assertInstanceOf(RectangularArea::class, $map);
        self::assertInstanceOf(Area::class, $map);
    }
}
