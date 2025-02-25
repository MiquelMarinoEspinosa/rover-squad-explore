<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Movement\Cartesian;

use Exception;
use Throwable;
use Core\Rover\Domain\Movement\UnknownMovement;

final class UnknownCartesianMovement extends Exception implements UnknownMovement
{
    private const ERROR_MESSAGE = 'Unknown movement: %s';

    private function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function create(string $value): self
    {
        return new self(
            sprintf(self::ERROR_MESSAGE, $value)
        );
    }
}
