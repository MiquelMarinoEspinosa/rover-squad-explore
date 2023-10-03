<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Movement;

use Throwable;
use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Collection\CollectionOutOfRange;
use Core\Rover\Domain\Movement\MovementCollectionOutOfRange;

final class MovementCollectionOutOfRangeTest extends TestCase
{
    public function testShouldCreateMovementCollectionOutOfRange(): void
    {
        $movementCollectionOutOfRange = MovementCollectionOutOfRange::create();

        self::assertInstanceOf(
            MovementCollectionOutOfRange::class,
            $movementCollectionOutOfRange
        );

        self::assertInstanceOf(
            CollectionOutOfRange::class,
            $movementCollectionOutOfRange
        );

        self::assertInstanceOf(
            Throwable::class,
            $movementCollectionOutOfRange
        );
    }
}