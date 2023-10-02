<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal;

use Exception;
use Throwable;
use Core\Rover\Domain\Rover\Direction\UnknownDirection;

final class UnknownCardinalCartesianDirection extends Exception implements UnknownDirection
{
    private const ERROR_MESSAGE = 'Unknown direction: %s';

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
