<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Area\Cartesian\Rectangular;

use Throwable;
use Core\Rover\Domain\Rover\Area\OutOfArea;
use Core\Rover\Domain\Rover\Point\Cartesian\CartesianPoint;

final class RectangularCartesianAreaOutOfArea extends \Exception implements OutOfArea
{
    private const ERROR_MESSAGE = 'Point position out of the area.' . PHP_EOL
        . 'Point abscissa: %d. Point ordinate: %d.' . PHP_EOL
        . 'Area lower left abscissa: %d. Area lower left ordinate: %d.' . PHP_EOL
        . 'Area upper right abscissa: %d. Area upper right ordinate: %d';

    private function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function create(
        CartesianPoint $areaLowerLeft,
        CartesianPoint $areaUpperRight,
        CartesianPoint $cartesianCoordinatePoint
    ): self {
        
        return new self(
            self::message(
                $areaLowerLeft,
                $areaUpperRight,
                $cartesianCoordinatePoint
            )
        );
    }

    private static function message(
        CartesianPoint $areaLowerLeft,
        CartesianPoint $areaUpperRight,
        CartesianPoint $cartesianCoordinatePoint
    ): string {
        $cartesianCoordinatePointData = $cartesianCoordinatePoint->data();
        $areaLowerLeftData            = $areaLowerLeft->data();
        $areaUpperRightData           = $areaUpperRight->data();

        return sprintf(
            self::ERROR_MESSAGE,
            $cartesianCoordinatePointData->abscissa(),
            $cartesianCoordinatePointData->ordinate(),
            $areaLowerLeftData->abscissa(),
            $areaLowerLeftData->ordinate(),
            $areaUpperRightData->abscissa(),
            $areaUpperRightData->ordinate()
        );
    }
}
