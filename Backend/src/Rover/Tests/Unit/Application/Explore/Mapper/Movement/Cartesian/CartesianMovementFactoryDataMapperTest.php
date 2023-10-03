<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\Explore\Mapper\Movement\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Application\Explore\Mapper\Movement\MovementFactoryDataMapper;
use Core\Rover\Application\Explore\Mapper\Movement\Cartesian\CartesianMovementFactoryDataMapper;
use Core\Rover\Application\Explore\Request\Movement\Cartesian\CartesianMovementDiscoverRequest;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovementFactoryData;

final class CartesianMovementFactoryDataMapperTest extends TestCase
{
    private const MOVEMENT_VALUE = 'L';

    public function testShouldCreateCartesianMovementFactoryDataMapper(): void
    {
        $request = $this->givenRequest();

        $cartesianMovementFactoryDataMapper = new CartesianMovementFactoryDataMapper(
            $request
        );

        self::assertInstanceOf(
            CartesianMovementFactoryDataMapper::class,
            $cartesianMovementFactoryDataMapper
        );

        self::assertInstanceOf(
            MovementFactoryDataMapper::class,
            $cartesianMovementFactoryDataMapper
        );
    }

    public function testShouldMapTheMovementFactoryData(): void
    {
        $request = $this->givenRequest();

        $expectedMovementFactoryData = $this->givenExpectedMovementFactoryData();

        $mapper = new CartesianMovementFactoryDataMapper($request);

        self::assertEquals(
            $expectedMovementFactoryData,
            $mapper->map()
        );
    }

    private function givenRequest(): CartesianMovementDiscoverRequest
    {
        return new CartesianMovementDiscoverRequest(
            self::MOVEMENT_VALUE
        );
    }

    private function givenExpectedMovementFactoryData(): CartesianMovementFactoryData
    {
        return new CartesianMovementFactoryData(
            self::MOVEMENT_VALUE
        );
    }
}
