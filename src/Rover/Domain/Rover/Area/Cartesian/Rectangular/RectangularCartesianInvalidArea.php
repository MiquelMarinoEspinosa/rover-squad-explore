<?php

declare(strict_types=1);

namespace Core\Rover\Domain\Rover\Area\Cartesian\Rectangular;

use Exception;
use Throwable;
use Core\Rover\Domain\Rover\Area\InvalidArea;
use Core\Rover\Domain\Rover\Point\Cartesian\CartesianPoint;

final class RectangularCartesianInvalidArea extends Exception implements InvalidArea
{
    private const ERROR_MESSAGE = 'Invalid area upper right coordinates. ' . PHP_EOL
        . 'Upper right abscissa: %d. ' . PHP_EOL
        . 'Upper right ordinate: %d. ' . PHP_EOL;

    private function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function create(
        CartesianPoint $invalidPoint
    ): self {
        $invalidPointData = $invalidPoint->data();

        return new self(
            sprintf(
                self::ERROR_MESSAGE,
                $invalidPointData->abscissa(),
                $invalidPointData->ordinate()
            )
        );
    }
}
