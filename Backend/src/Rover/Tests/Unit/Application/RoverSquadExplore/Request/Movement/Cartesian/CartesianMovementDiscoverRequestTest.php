<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\RoverSquadExplore\Request\Movement\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Application\RoverSquadExplore\Request\Movement\MovementDiscoverRequest;
use Core\Rover\Application\RoverSquadExplore\Request\Movement\Cartesian\CartesianMovementDiscoverRequest;

final class CartesianMovementDiscoverRequestTest extends TestCase
{
    private const MOVEMENT_VALUE = 'L';

    public function testShouldCreateTheCartesianMovementDiscoverRequest(): void
    {
        $cartesianMovementDiscoverRequest = new CartesianMovementDiscoverRequest(
            self::MOVEMENT_VALUE
        );

        self::assertInstanceOf(
            CartesianMovementDiscoverRequest::class,
            $cartesianMovementDiscoverRequest
        );

        self::assertInstanceOf(
            MovementDiscoverRequest::class,
            $cartesianMovementDiscoverRequest
        );
    }

    public function testShouldReturnTheMovementValue(): void
    {
        $cartesianMovementDiscoverRequest = new CartesianMovementDiscoverRequest(
            self::MOVEMENT_VALUE
        );

        self::assertSame(
            self::MOVEMENT_VALUE,
            $cartesianMovementDiscoverRequest->movementValue()
        );
    }
}
