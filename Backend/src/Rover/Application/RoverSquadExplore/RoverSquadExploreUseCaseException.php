<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore;

use Exception;
use Throwable;
use Core\Rover\Application\UseCaseException;

final class RoverSquadExploreUseCaseException extends Exception implements UseCaseException
{
    private const MESSAGE = 'RoverSquadExploreUseCaseException: %s';

    private function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function create(string $message): self
    {
        return new self(
            sprintf(self::MESSAGE, $message)
        );
    }
}
