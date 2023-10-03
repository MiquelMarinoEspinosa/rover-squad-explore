<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Movement;

use Exception;
use Throwable;
use Core\Rover\Domain\Collection\CollectionOutOfRange;

final class MovementCollectionOutOfRange extends Exception implements CollectionOutOfRange
{
    private const MESSAGE = 'Movement collection out of range';

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