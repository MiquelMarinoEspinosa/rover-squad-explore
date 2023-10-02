<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Direction\Cartesian\Cardinal;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\EastCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirectionFactory;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirectionAbstractFactory;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\NorthCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\SouthCardinalCartesianDirection;

final class CartesianCardinalDirectionFactoryTest extends TestCase
{
    private const EAST_VALUE  = 'E';
    private const NORTH_VALUE = 'N';

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

    public function testShouldBeTheSameInstanceWhenInstanciateTwice(): void
    {
        self::assertSame(
            CartesianCardinalDirectionFactory::getInstance(),
            CartesianCardinalDirectionFactory::getInstance()
        );
    }

    public function testShouldCreateEastCartesianCardinalDirection(): void
    {
        $cartesianCardinalDirectionFactory = CartesianCardinalDirectionFactory::getInstance();

        self::assertInstanceOf(
            EastCardinalCartesianDirection::class,
            $cartesianCardinalDirectionFactory->create(self::EAST_VALUE)
        );
    }

    public function testShouldCreateNorthCartesianCardinalDirection(): void
    {
        $cartesianCardinalDirectionFactory = CartesianCardinalDirectionFactory::getInstance();

        self::assertInstanceOf(
            NorthCardinalCartesianDirection::class,
            $cartesianCardinalDirectionFactory->create(self::NORTH_VALUE)
        );
    }

    public function testShouldCreateSouthCartesianCardinalDirection(): void
    {
        $cartesianCardinalDirectionFactory = CartesianCardinalDirectionFactory::getInstance();

        self::assertInstanceOf(
            SouthCardinalCartesianDirection::class,
            $cartesianCardinalDirectionFactory->create('S')
        );
    }
}
