<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Domain\Rover\Area\Cartesian;

use Throwable;
use Core\RoverControlPanel\Domain\Rover\Area\OutOfArea;
use Core\RoverControlPanel\Domain\Rover\Point\Cartesian\CartesianPoint;

final class RectangularCartesianAreaOutOfArea extends \Exception implements OutOfArea
{
    private const ERROR_MESSAGE = 'Point position out of the area.'
        . 'Point abscissa: %d. Point ordinate: %d.'
        . 'Area lower left abscissa: %d. Area lower left ordinate: %d.'
        . 'Area upper right abscissa: %d. Area upper right ordinate: %d';

    private function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function create(
        CartesianPoint $rectangularCartesianPointAreaLowerLeft,
        CartesianPoint $rectangularCartesianPointAreaUpperRight,
        CartesianPoint $cartesianCoordinatePoint
    ): self {
        return new self(
            self::message(
                $rectangularCartesianPointAreaLowerLeft,
                $rectangularCartesianPointAreaUpperRight,
                $cartesianCoordinatePoint
            )
        );
    }

    private static function message(
        CartesianPoint $rectangularCartesianPointAreaLowerLeft,
        CartesianPoint $rectangularCartesianPointAreaUpperRight,
        CartesianPoint $cartesianCoordinatePoint
    ): string {
        return sprintf(
            self::ERROR_MESSAGE,
            $cartesianCoordinatePoint->data()->abscissa(),
            $cartesianCoordinatePoint->data()->ordinate(),
            $rectangularCartesianPointAreaLowerLeft->data()->abscissa(),
            $rectangularCartesianPointAreaLowerLeft->data()->ordinate(),
            $rectangularCartesianPointAreaUpperRight->data()->abscissa(),
            $rectangularCartesianPointAreaUpperRight->data()->ordinate()
        );
    }
}
