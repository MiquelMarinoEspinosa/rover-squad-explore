<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Direction\Cartesian\Cardinal;

use Throwable;
use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Direction\UnknownDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\UnknownCardinalCartesianDirection;

final class UnknownCardinalCartesianDirectionTest extends TestCase
{
    private const UNKNOWN_VALUE = 'U';

    public function testShouldCreateTheUnknownCardinalCartesianDirection(): void
    {
        $unknownCardinalCartesianDirection = UnknownCardinalCartesianDirection::create(
            self::UNKNOWN_VALUE
        );

        self::assertInstanceOf(
            UnknownCardinalCartesianDirection::class,
            $unknownCardinalCartesianDirection
        );

        self::assertInstanceOf(
            UnknownDirection::class,
            $unknownCardinalCartesianDirection
        );

        self::assertInstanceOf(
            Throwable::class,
            $unknownCardinalCartesianDirection
        );
    }
}
