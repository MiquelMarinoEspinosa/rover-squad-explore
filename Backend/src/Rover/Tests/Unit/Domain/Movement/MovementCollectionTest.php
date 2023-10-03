<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Movement;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Collection\Collection;
use Core\Rover\Domain\Movement\Movement;
use Core\Rover\Domain\Movement\MovementCollection;
use Core\Rover\Domain\Movement\MovementCollectionOutOfRange;

final class MovementCollectionTest extends TestCase
{
    private MovementCollection $movementCollection;

    protected function setUp(): void
    {
        $this->movementCollection = new MovementCollection;
    }

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

    public function testShouldReturnTrueWhenEmptyMethodExecutedOnEmpty(): void
    {
        self::assertTrue(
            $this->movementCollection->empty()
        );
    }

    public function testShouldReturnFalseWhenNextMethodExecutedOnEmpty(): void
    {
        self::assertFalse(
            $this->movementCollection->next()
        );
    }

    public function testShouldThrowAnExceptionWhenCurrentMethodExecutedOnEmpty(): void
    {
        self::expectException(
            MovementCollectionOutOfRange::class
        );

        $this->movementCollection->current();
    }

    public function testShouldAddTheMovement(): void
    {
        $movement = self::createMock(Movement::class);

        $this->movementCollection->add($movement);

        self::assertSame(
            $movement,
            $this->movementCollection->current()
        );
    }

    public function testShouldNotBeEmpty(): void
    {
        $movement = self::createMock(Movement::class);

        $this->movementCollection->add($movement);

        self::assertFalse(
            $this->movementCollection->empty()
        );
    }

    public function testShouldHaveNext(): void
    {
        $movement = self::createMock(Movement::class);

        $this->movementCollection->add($movement);

        self::assertTrue(
            $this->movementCollection->next()
        );
    }

    public function testShouldNotHaveNext(): void
    {
        $movement = self::createMock(Movement::class);

        $this->movementCollection->add($movement);

        self::assertTrue(
            $this->movementCollection->next()
        );

        self::assertFalse(
            $this->movementCollection->next()
        );
    }
}