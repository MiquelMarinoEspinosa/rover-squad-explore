<?php

namespace Core\Rover\Domain\Movement\Cartesian;

interface CartesianMovementAbstractFactory
{
    public static function getInstance(): self;

    public function create(string $value): CartesianMovement;
}