<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Application\Explore\Request\Movement\Cartesian;

use Core\Rover\Application\Explore\Request\Movement\Cartesian\CartesianMovementDiscoverRequest;
use Core\Rover\Application\Explore\Request\Movement\MovementDiscoverRequest;
use PHPUnit\Framework\TestCase;

final class CartesianMovementDiscoverRequestTest extends TestCase
{
    public function testShouldCreateTheCartesianMovementDiscoverRequest(): void
    {
        $cartesianMovementDiscoverRequest = new CartesianMovementDiscoverRequest;

        self::assertInstanceOf(
            CartesianMovementDiscoverRequest::class,
            $cartesianMovementDiscoverRequest
        );

        self::assertInstanceOf(
            MovementDiscoverRequest::class,
            $cartesianMovementDiscoverRequest
        );
    }
}
