<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Movement\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Movement\Movement;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovement;
use Core\Rover\Domain\Movement\Cartesian\ForwardCartesianMovement;

final class ForwardCartesianMovementTest extends TestCase
{
    public function testShouldCreateTheForwardCartesianMovement(): void
    {
        $forwardCartesianMovement = new ForwardCartesianMovement;

        self::assertInstanceOf(
            ForwardCartesianMovement::class,
            $forwardCartesianMovement
        );

        self::assertInstanceOf(
            CartesianMovement::class,
            $forwardCartesianMovement
        );

        self::assertInstanceOf(
            Movement::class,
            $forwardCartesianMovement
        );
    }
}
