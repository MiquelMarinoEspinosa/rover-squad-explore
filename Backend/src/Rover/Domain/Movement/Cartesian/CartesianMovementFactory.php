<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Movement\Cartesian;

final class CartesianMovementFactory implements CartesianMovementAbstractFactory
{
    private const FORWARD_VALUE = 'M';
    private const LEFT_VALUE    = 'L';
    private const RIGHT_VALUE   = 'R';

    private static ?self $instance = null;

    public static function getInstance(): self
    {
        if (null !== self::$instance) {
            return self::$instance;
        }

        self::$instance = new self;

        return self::$instance;
    }

    public function create(string $value): CartesianMovement
    {
        return match ($value) {
            self::FORWARD_VALUE => new ForwardCartesianMovement,
            self::LEFT_VALUE    => new LeftCartesianMovement,
            self::RIGHT_VALUE   => new RightCartesianMovement,
            default             => throw UnknownCartesianMovement::create($value)
        };
    }
}
