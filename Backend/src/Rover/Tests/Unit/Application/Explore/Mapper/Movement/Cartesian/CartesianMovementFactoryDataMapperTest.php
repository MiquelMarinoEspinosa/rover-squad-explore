<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\Explore\Mapper\Movement\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Application\Explore\Mapper\Movement\MovementFactoryDataMapper;
use Core\Rover\Application\Explore\Mapper\Movement\Cartesian\CartesianMovementFactoryDataMapper;

final class CartesianMovementFactoryDataMapperTest extends TestCase
{
    public function testShouldCreateCartesianMovementFactoryDataMapper(): void
    {
        $cartesianMovementFactoryDataMapper = new CartesianMovementFactoryDataMapper;

        self::assertInstanceOf(
            CartesianMovementFactoryDataMapper::class,
            $cartesianMovementFactoryDataMapper
        );

        self::assertInstanceOf(
            MovementFactoryDataMapper::class,
            $cartesianMovementFactoryDataMapper
        );
    }
}
