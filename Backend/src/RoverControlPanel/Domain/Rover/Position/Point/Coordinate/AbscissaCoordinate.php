<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate;

final readonly class AbscissaCoordinate implements Coordinate
{
    private const MOVEMENT_VALUE = 1;
    private const ERROR_MESSAGE  = 'AbscissaCoordinate operation not allowed: ';

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
        return new self($this->increment());
    }

    public function moveLeft(): self
    {
        return new self($this->decrement());
    }

    public function value(): int
    {
        return $this->value;
    }

    private function increment(): int
    {
        return $this->value + self::MOVEMENT_VALUE;
    }

    private function decrement(): int
    {
        return $this->value - self::MOVEMENT_VALUE;
    }

    private function buildBadMovementException(
        string $movement
    ): NotAllowedMovement {

        return new NotAllowedMovement(
            self::ERROR_MESSAGE . $movement
        );
    }
}
