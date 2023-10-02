<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Movement\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Movement\Movement;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovement;
use Core\Rover\Domain\Movement\Cartesian\RightCartesianMovement;

final class RightCartesianMovementTest extends TestCase
{
    public function testShouldCreateTheRightCartesianMovement(): void
    {
        $rightCartesianMovement = new RightCartesianMovement;

        self::assertInstanceOf(
            RightCartesianMovement::class,
            $rightCartesianMovement
        );

        self::assertInstanceOf(
            CartesianMovement::class,
            $rightCartesianMovement
        );

        self::assertInstanceOf(
            Movement::class,
            $rightCartesianMovement
        );
    }
}
