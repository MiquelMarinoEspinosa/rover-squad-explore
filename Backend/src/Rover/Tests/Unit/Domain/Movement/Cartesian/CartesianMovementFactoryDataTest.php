<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Movement\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Movement\MovementFactoryData;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovementFactoryData;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovementAbstractFactoryData;

final class CartesianMovementFactoryDataTest extends TestCase
{
    public function testShouldCreateTheCartesianMovementFactoryData(): void
    {
        $cartesianMovementFactoryData = new CartesianMovementFactoryData;

        self::assertInstanceOf(
            CartesianMovementFactoryData::class,
            $cartesianMovementFactoryData
        );

        self::assertInstanceOf(
            CartesianMovementAbstractFactoryData::class,
            $cartesianMovementFactoryData
        );

        self::assertInstanceOf(
            MovementFactoryData::class,
            $cartesianMovementFactoryData
        );
    }

    public function testShouldReturnTheMovementValue(): void
    {
        $cartesianMovementFactoryData = new CartesianMovementFactoryData('L');

        self::assertSame(
            'L',
            $cartesianMovementFactoryData->movementValue()
        );
    }
}
