<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore;

use Exception;
use Throwable;

final class RoverSquadExploreUseCaseUnknown extends Exception
{
    private const MESSAGE = 'RoverSquadExploreUseCaseRegistry use case unknown: %s';

    private function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function create(string $roverUseCaseName): self
    {
        return new self(
            sprintf(self::MESSAGE,  $roverUseCaseName)
        );
    }
}
