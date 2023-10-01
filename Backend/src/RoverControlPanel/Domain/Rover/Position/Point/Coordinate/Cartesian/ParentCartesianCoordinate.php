<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Cartesian;

abstract class ParentCartesianCoordinate implements CartesianCoordinate
{
    private const ERROR_MESSAGE = 'CartesianCoordinate movement not allowed: ';
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

    public function greaterThan(
        CartesianCoordinate $cartesianCoordinate
    ): bool {

        return $this->value > $cartesianCoordinate->value();
    }

    public function lesserThan(
        CartesianCoordinate $cartesianCoordinate
    ): bool {

        return $this->value < $cartesianCoordinate->value();
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
    ): CartesianCoordinateNotAllowedMovement {

        return new CartesianCoordinateNotAllowedMovement(
            self::ERROR_MESSAGE . $movement
        );
    }
}
