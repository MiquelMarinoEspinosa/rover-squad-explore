<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Direction\Cartesian\Cardinal;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirectionFactory;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirectionAbstractFactory;

final class CartesianCardinalDirectionFactoryTest extends TestCase
{
    public function testShouldInstanciateCartesianCardinalDirectionFactory(): void
    {
        $cartesianCardinalDirectionFactory = CartesianCardinalDirectionFactory::getInstance();

        self::assertInstanceOf(
            CartesianCardinalDirectionFactory::class,
            $cartesianCardinalDirectionFactory
        );

        self::assertInstanceOf(
            CartesianCardinalDirectionAbstractFactory::class,
            $cartesianCardinalDirectionFactory
        );
    }
}
