<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Unit\Domain\Rover\Direction\Cartesian\Cardinal;

use PHPUnit\Framework\TestCase;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\EastCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirectionFactory;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\CartesianCardinalDirectionAbstractFactory;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\NorthCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\SouthCardinalCartesianDirection;
use Core\Rover\Domain\Rover\Direction\Cartesian\Cardinal\WestCardinalCartesianDirection;

final class CartesianCardinalDirectionFactoryTest extends TestCase
{
    private const EAST_VALUE  = 'E';
    private const NORTH_VALUE = 'N';
    private const SOUTH_VALUE = 'S';
    private const WEST_VALUE  = 'W';

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
        $cartesianCardinalDirectionFactory = $this->givenCartesianCardinalDirectionFactory();

        self::assertInstanceOf(
            EastCardinalCartesianDirection::class,
            $cartesianCardinalDirectionFactory->create(
                self::EAST_VALUE
            )
        );
    }

    public function testShouldCreateNorthCartesianCardinalDirection(): void
    {
        $cartesianCardinalDirectionFactory = $this->givenCartesianCardinalDirectionFactory();

        self::assertInstanceOf(
            NorthCardinalCartesianDirection::class,
            $cartesianCardinalDirectionFactory->create(
                self::NORTH_VALUE
            )
        );
    }

    public function testShouldCreateSouthCartesianCardinalDirection(): void
    {
        $cartesianCardinalDirectionFactory = $this->givenCartesianCardinalDirectionFactory();

        self::assertInstanceOf(
            SouthCardinalCartesianDirection::class,
            $cartesianCardinalDirectionFactory->create(
                self::SOUTH_VALUE
            )
        );
    }

    public function testShouldCreateWestCartesianCardinalDirection(): void
    {
        $cartesianCardinalDirectionFactory = $this->givenCartesianCardinalDirectionFactory();

        self::assertInstanceOf(
            WestCardinalCartesianDirection::class,
            $cartesianCardinalDirectionFactory->create(
                self::WEST_VALUE
            )
        );
    }

    private function givenCartesianCardinalDirectionFactory(): CartesianCardinalDirectionFactory
    {
        return CartesianCardinalDirectionFactory::getInstance();
    }
}
