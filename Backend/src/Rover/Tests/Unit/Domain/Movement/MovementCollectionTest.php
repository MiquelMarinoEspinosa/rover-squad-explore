<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Movement;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Collection\Collection;
use Core\Rover\Domain\Movement\MovementCollection;

final class MovementCollectionTest extends TestCase
{
    public function testShouldCreateTheMovementCollection(): void 
    {
        $movementCollection = new MovementCollection;
        
        self::assertInstanceOf(
            MovementCollection::class,
            $movementCollection
        );

        self::assertInstanceOf(
            Collection::class,
            $movementCollection
        );
    }
}