<?php

namespace Core\Rover\Domain\Movement\Cartesian;

use Core\Rover\Domain\Movement\MovementFactory;

interface CartesianMovementAbstractFactory extends MovementFactory
{
    public static function getInstance(): self;
}