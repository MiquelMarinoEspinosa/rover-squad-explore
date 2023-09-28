<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Position\Area;

use Core\Rover\Domain\Position\Area\Area;
use PHPUnit\Framework\TestCase;

final class AreaTest extends TestCase
{
    public function testShouldCreateTheArea(): void
    {
        $map = new Area();

        self::assertInstanceOf(Area::class, $map);
    }
}
