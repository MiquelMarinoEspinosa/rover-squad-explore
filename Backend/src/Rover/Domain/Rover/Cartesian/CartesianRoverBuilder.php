<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Cartesian;

interface CartesianRoverBuilder
{
    public static function getInstance(): self;    
}