<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Movement\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovementFactory;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovementAbstractFactory;
use Core\Rover\Domain\Movement\Cartesian\UnknownCartesianMovement;

final class CartesianMovementFactoryTest extends TestCase
{
    private const UNKNOWN_MOVEMENT_VALUE = 'unknown';

    public function testShouldInstanciateCartesianMovementFactory(): void
    {
        $cartesianMovementFactory = CartesianMovementFactory::getInstance();

        self::assertInstanceOf(
            CartesianMovementFactory::class,
            $cartesianMovementFactory
        );

        self::assertInstanceOf(
            CartesianMovementAbstractFactory::class,
            $cartesianMovementFactory
        );
    }

    public function testShouldReturnTheSameInstanceWhenInstanciatedTwice(): void
    {
        self::assertSame(
            CartesianMovementFactory::getInstance(),
            CartesianMovementFactory::getInstance()
        );
    }

    public function testGivenAnUnknownMovementValueShouldThrowAnException(): void
    {
        self::expectException(
            UnknownCartesianMovement::class
        );

        CartesianMovementFactory::getInstance()->create(
            self::UNKNOWN_MOVEMENT_VALUE
        );
    }
}