<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Movement\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Movement\Cartesian\LeftCartesianMovement;
use Core\Rover\Domain\Movement\Cartesian\RightCartesianMovement;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovementFactory;
use Core\Rover\Domain\Movement\Cartesian\ForwardCartesianMovement;
use Core\Rover\Domain\Movement\Cartesian\UnknownCartesianMovement;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovementAbstractFactory;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovementFactoryData;
use Core\Rover\Domain\Movement\MovementFactory;

final class CartesianMovementFactoryTest extends TestCase
{
    private const UNKNOWN_MOVEMENT_VALUE = 'unknown';
    private const FORWARD_MOVEMENT_VALUE = 'M';
    private const LEFT_MOVEMENT_VALUE    = 'L';
    private const RIGHT_MOVEMENT_VALUE   = 'R';

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

        self::assertInstanceOf(
            MovementFactory::class,
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
            new CartesianMovementFactoryData(
                self::UNKNOWN_MOVEMENT_VALUE
            )
        );
    }

    public function testShouldCreateTheForwardMovement(): void
    {
        self::assertInstanceOf(
            ForwardCartesianMovement::class,
            CartesianMovementFactory::getInstance()->create(
                new CartesianMovementFactoryData(
                    self::FORWARD_MOVEMENT_VALUE
                )
            )
        );
    }

    public function testShouldCreateTheLeftMovement(): void
    {
        self::assertInstanceOf(
            LeftCartesianMovement::class,
            CartesianMovementFactory::getInstance()->create(
                new CartesianMovementFactoryData(
                    self::LEFT_MOVEMENT_VALUE
                )
            )
        );
    }

    public function testShouldCreateTheRightMovement(): void
    {
        self::assertInstanceOf(
            RightCartesianMovement::class,
            CartesianMovementFactory::getInstance()->create(
                new CartesianMovementFactoryData(
                    self::RIGHT_MOVEMENT_VALUE
                )
            )
        );
    }
}
