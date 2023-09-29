<?php

namespace Core\RoverControlPanel\Domain\Rover\Position\Point\Coordinate;

abstract class CartesianCoordinate implements Coordinate
{
    public function __construct(
        protected int $value
    ) {
    }
}