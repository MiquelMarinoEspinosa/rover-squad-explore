<?php

declare(strict_types=1);

namespace Core\Tests\Unit\Domain\Rover\Position\Coordinates\Area;

use Core\RoverControlPanel\Domain\Rover\Position\Coordinates\Area\Area;
use Core\RoverControlPanel\Domain\Rover\Position\Coordinates\Area\RectangularArea;
use PHPUnit\Framework\TestCase;

final class RectangularAreaTest extends TestCase
{
    public function testShouldCreateTheArea(): void
    {
        $map = new RectangularArea();

        self::assertInstanceOf(RectangularArea::class, $map);
        self::assertInstanceOf(Area::class, $map);
    }
}
