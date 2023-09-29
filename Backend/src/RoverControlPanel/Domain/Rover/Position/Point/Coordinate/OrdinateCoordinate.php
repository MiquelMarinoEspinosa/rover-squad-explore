<?php

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate;

final class OrdinateCoordinate extends CartesianCoordinate
{
    private const MOVEMENT_STEP = 1;
    private const ERROR_MESSAGE = 'OrdinateCoordinate operation not allowed: ';

    public function __construct(
        private int $value
    ) {
    }

    public function moveUp(): self
    {
        return new self(
            $this->increment()
        );
    }

    public function moveDown(): self
    {
        return new self(
            $this->decrement()
        );
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

    private function increment(): int
    {
        return $this->value + self::MOVEMENT_STEP;
    }

    private function decrement(): int
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
