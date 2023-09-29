<?php

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate;

abstract class CartesianCoordinate implements Coordinate
{
    private const ERROR_MESSAGE = 'CartesianCoordinate operation not allowed: ';
    private const MOVEMENT_STEP = 1;

    public function __construct(
        private int $value
    ) {
    }

    public function moveUp(): self
    {
        throw $this->buildBadMovementException('moveUp');
    }

    public function moveDown(): self
    {
        throw $this->buildBadMovementException('moveDown');
    }

    public function moveRight(): self
    {
        throw $this->buildBadMovementException('moveRight');
    }

    public function moveLeft(): self
    {
        throw $this->buildBadMovementException('moveLeft');
    }

    public function value(): int
    {
        return $this->value;
    }

    protected function increment(): int
    {
        return $this->value + self::MOVEMENT_STEP;
    }

    protected function decrement(): int
    {
        return $this->value - self::MOVEMENT_STEP;
    }

    private function buildBadMovementException(
        string $movement
    ): NotAllowedMovement {

        return new NotAllowedMovement(
            self::ERROR_MESSAGE . $movement
        );
    }
}
