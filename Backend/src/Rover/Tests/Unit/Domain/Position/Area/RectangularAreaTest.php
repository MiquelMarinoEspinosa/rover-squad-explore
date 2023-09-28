<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Position\Area;

use Core\Rover\Domain\Position\Area\Area;
use Core\Rover\Domain\Position\Area\RectangularArea;
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
