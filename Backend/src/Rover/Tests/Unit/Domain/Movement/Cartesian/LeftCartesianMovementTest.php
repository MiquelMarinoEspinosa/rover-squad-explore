<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Movement\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Movement\Movement;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovement;
use Core\Rover\Domain\Movement\Cartesian\LeftCartesianMovement;

final class LeftCartesianMovementTest extends TestCase
{
    public function testShouldCreateTheLeftCartesianMovement(): void
    {
        $leftCartesianMovement = new LeftCartesianMovement;

        self::assertInstanceOf(
            LeftCartesianMovement::class,
            $leftCartesianMovement
        );

        self::assertInstanceOf(
            CartesianMovement::class,
            $leftCartesianMovement
        );

        self::assertInstanceOf(
            Movement::class,
            $leftCartesianMovement
        );
    }
}
