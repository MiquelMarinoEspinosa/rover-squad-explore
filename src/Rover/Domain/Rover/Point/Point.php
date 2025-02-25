<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Point;

interface Point
{
    public function data(): PointData;
}
