<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore;

final class RoverSquadExploreUseCaseRegistry
{
    public static function getInstance(): self
    {
        return new self;
    }
}