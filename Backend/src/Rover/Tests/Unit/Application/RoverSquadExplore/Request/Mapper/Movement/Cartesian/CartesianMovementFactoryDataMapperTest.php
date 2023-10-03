<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\RoverSquadExplore\Request\Mapper\Movement\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Movement\MovementFactoryDataMapper;
use Core\Rover\Application\RoverSquadExplore\Request\Mapper\Movement\Cartesian\CartesianMovementFactoryDataMapper;
use Core\Rover\Application\RoverSquadExplore\Request\Movement\Cartesian\CartesianMovementExploreRequest;
use Core\Rover\Domain\Movement\Cartesian\CartesianMovementFactoryData;

final class CartesianMovementFactoryDataMapperTest extends TestCase
{
    private const MOVEMENT_VALUE = 'L';

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

    public function testShouldMapTheMovementFactoryData(): void
    {
        $request = $this->givenRequest();

        $expectedMovementFactoryData = $this->givenExpectedMovementFactoryData();

        $mapper = new CartesianMovementFactoryDataMapper;

        self::assertEquals(
            $expectedMovementFactoryData,
            $mapper->map($request)
        );
    }

    private function givenRequest(): CartesianMovementExploreRequest
    {
        return new CartesianMovementExploreRequest(
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
