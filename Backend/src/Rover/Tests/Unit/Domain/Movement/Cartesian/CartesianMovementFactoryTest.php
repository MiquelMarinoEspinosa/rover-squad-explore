<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Movement\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovementFactory;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovementAbstractFactory;

final class CartesianMovementFactoryTest extends TestCase
{
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
}