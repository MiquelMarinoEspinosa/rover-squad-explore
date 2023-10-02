<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Movement\Cartesian;

use Core\Rover\Domain\Movement\Cartesian\UnknownCartesianMovement;
use Core\Rover\Domain\Movement\UnknownMovement;
use PHPUnit\Framework\TestCase;
use Throwable;

final class UnknownCartesianMovementTest extends TestCase
{
    public function testShouldCreateTheUnknownCartesianMovement(): void
    {
        $unknownCartesianMovement = UnknownCartesianMovement::create('unknown');

        self::assertInstanceOf(
            UnknownCartesianMovement::class,
            $unknownCartesianMovement
        );

        self::assertInstanceOf(
            UnknownMovement::class,
            $unknownCartesianMovement
        );

        self::assertInstanceOf(
            Throwable::class,
            $unknownCartesianMovement
        );
    }    
}