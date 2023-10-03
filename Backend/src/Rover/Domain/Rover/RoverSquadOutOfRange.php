<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover;

use Exception;
use Throwable;
use Core\Rover\Domain\Collection\CollectionOutOfRange;

final class RoverSquadOutOfRange extends Exception implements CollectionOutOfRange
{
    private const MESSAGE = 'Rover squad out of range';

    private function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function create(): self
    {
        return new self(
            self::MESSAGE
        );
    }
}
