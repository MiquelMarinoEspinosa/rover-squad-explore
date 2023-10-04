<?php

declare(strict_types=1);

namespace Core\Rover\Application\RoverSquadExplore;

final class RoverSquadExploreUseCaseRegistry
{
    private static ?self $instance = null;
    
    public static function getInstance(): self
    {
        if (null !== self::$instance)
        {
            return self::$instance;
        }
        
        self::$instance = new self;

        return self::$instance;
    }
}