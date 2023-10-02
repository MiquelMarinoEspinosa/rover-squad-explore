<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal;

final class CartesianCardinalDirectionFactory implements CartesianCardinalDirectionAbstractFactory
{
    public static function getInstance(): self
    {
        return new self();
    }
}
