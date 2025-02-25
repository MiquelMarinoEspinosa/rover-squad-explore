<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\RoverSquadExplore\Request\Movement\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\Rover\Application\RoverSquadExplore\Request\Movement\MovementExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Request\Movement\Cartesian\CartesianMovementExploreRequest;

final class CartesianMovementExploreRequestTest extends TestCase
{
    private const MOVEMENT_VALUE = 'L';

    public function testShouldCreateTheCartesianMovementExploreRequest(): void
    {
        $cartesianMovementExploreRequest = new CartesianMovementExploreRequest(
            self::MOVEMENT_VALUE
        );

        self::assertInstanceOf(
            CartesianMovementExploreRequest::class,
            $cartesianMovementExploreRequest
        );

        self::assertInstanceOf(
            MovementExploreRequest::class,
            $cartesianMovementExploreRequest
        );
    }

    public function testShouldReturnTheMovementValue(): void
    {
        $cartesianMovementExploreRequest = new CartesianMovementExploreRequest(
            self::MOVEMENT_VALUE
        );

        self::assertSame(
            self::MOVEMENT_VALUE,
            $cartesianMovementExploreRequest->movementValue()
        );
    }
}
