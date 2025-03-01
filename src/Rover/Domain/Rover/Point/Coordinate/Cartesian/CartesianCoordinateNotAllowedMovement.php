<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Point\Coordinate\Cartesian;

use Throwable;
use Core\Rover\Domain\Rover\Point\Coordinate\CoordinateNotAllowedMovement;

final class CartesianCoordinateNotAllowedMovement extends \Exception implements CoordinateNotAllowedMovement 
{
    private const ERROR_MESSAGE = 'CartesianCoordinate movement not allowed: ';

    private function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function create(
        string $movement
    ): self {
        return new self(
            self::ERROR_MESSAGE . $movement
        );
    }
}
