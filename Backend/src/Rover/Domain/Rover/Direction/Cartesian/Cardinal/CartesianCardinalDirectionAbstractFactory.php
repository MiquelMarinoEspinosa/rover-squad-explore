<?php

namespace Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal;

interface CartesianCardinalDirectionAbstractFactory
{
    public static function getInstance(): self;
}
