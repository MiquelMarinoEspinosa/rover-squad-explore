<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate\Cartesian;

use Throwable;

final class CartesianCoordinateNotAllowedMovement extends \Exception
{
    private const ERROR_MESSAGE = 'CartesianCoordinate movement not allowed: ';

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
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
