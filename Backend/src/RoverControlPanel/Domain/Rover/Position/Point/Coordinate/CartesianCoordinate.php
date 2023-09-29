<?php

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate;

abstract class CartesianCoordinate implements Coordinate
{
    private const ERROR_MESSAGE = 'CartesianCoordinate operation not allowed: ';

    public function __construct(
        protected int $value
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

    private function buildBadMovementException(
        string $movement
    ): NotAllowedMovement {

        return new NotAllowedMovement(
            self::ERROR_MESSAGE . $movement
        );
    }
}
