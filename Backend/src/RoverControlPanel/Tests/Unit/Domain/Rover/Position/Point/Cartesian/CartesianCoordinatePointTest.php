<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Point;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian\CartesianPoint;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian\CartesianCoordinatePoint;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian\CartesianCoordinatePointData;

final class CartesianCoordinatePointTest extends TestCase
{
    private const ABSCISSA = 1;
    private const ORDINATE = 2;

    private CartesianCoordinatePoint $cartesianCoordinatePoint;

    protected function setUp(): void
    {
        $this->cartesianCoordinatePoint = $this->giveCartesianCoordinatePoint(
            self::ABSCISSA,
            self::ORDINATE
        );
    }

    public function testShouldCreateCartesianCoordinatePoint(): void
    {
        $cartesianCoordinatePoint = $this->giveCartesianCoordinatePoint(
            self::ABSCISSA,
            self::ORDINATE
        );

        self::assertInstanceOf(
            CartesianCoordinatePoint::class,
            $cartesianCoordinatePoint
        );

        self::assertInstanceOf(
            CartesianPoint::class,
            $cartesianCoordinatePoint
        );

        self::assertInstanceOf(
            Point::class,
            $cartesianCoordinatePoint
        );
    }

    public function testShouldReturnTheData(): void
    {
        $expectedCartesianCoordinatePointData = new CartesianCoordinatePointData(
            self::ABSCISSA,
            self::ORDINATE
        );

        $currentCartesianCoordinatePointData = $this->cartesianCoordinatePoint->data();

        self::assertSame(
            $expectedCartesianCoordinatePointData->abscissa(),
            $currentCartesianCoordinatePointData->abscissa()
        );

        self::assertSame(
            $expectedCartesianCoordinatePointData->ordinate(),
            $currentCartesianCoordinatePointData->ordinate()
        );
    }

    public function testShouldNotMoveAbscissaWhenMoveUp(): void
    {
        $movedCartesianPoint = $this->cartesianCoordinatePoint->moveUp();

        self::assertSame(
            $movedCartesianPoint->data()->abscissa(),
            $this->cartesianCoordinatePoint->data()->abscissa()
        );
    }

    public function testShouldMoveOrdinateWhenMoveUp(): void
    {
        $movedCartesianPoint = $this->cartesianCoordinatePoint->moveUp();

        self::assertSame(
            $movedCartesianPoint->data()->ordinate(),
            $this->cartesianCoordinatePoint->data()->ordinate() + 1
        );
    }

    public function testShouldNotMoveAbscissaWhenMoveDown(): void
    {
        $movedCartesianPoint = $this->cartesianCoordinatePoint->moveDown();

        self::assertSame(
            $movedCartesianPoint->data()->abscissa(),
            $this->cartesianCoordinatePoint->data()->abscissa()
        );
    }

    public function testShouldMoveOrdinateWhenMoveDown(): void
    {
        $movedCartesianPoint = $this->cartesianCoordinatePoint->moveDown();

        self::assertSame(
            $movedCartesianPoint->data()->ordinate(),
            $this->cartesianCoordinatePoint->data()->ordinate() - 1
        );
    }

    public function testShouldMoveAbscissaWhenMoveRight(): void
    {
        $movedCartesianPoint = $this->cartesianCoordinatePoint->moveRight();

        self::assertSame(
            $movedCartesianPoint->data()->abscissa(),
            $this->cartesianCoordinatePoint->data()->abscissa() + 1
        );
    }

    public function testShouldNotMoveOrdinateWhenMoveRight(): void
    {
        $movedCartesianPoint = $this->cartesianCoordinatePoint->moveRight();

        self::assertSame(
            $movedCartesianPoint->data()->ordinate(),
            $this->cartesianCoordinatePoint->data()->ordinate()
        );
    }

    public function testShouldMoveAbscissaWhenMoveLeft(): void
    {
        $movedCartesianPoint = $this->cartesianCoordinatePoint->moveLeft();

        self::assertSame(
            $movedCartesianPoint->data()->abscissa(),
            $this->cartesianCoordinatePoint->data()->abscissa() - 1
        );
    }

    public function testShouldNotMoveOrdinateWhenMoveLeft(): void
    {
        $movedCartesianPoint = $this->cartesianCoordinatePoint->moveLeft();

        self::assertSame(
            $movedCartesianPoint->data()->ordinate(),
            $this->cartesianCoordinatePoint->data()->ordinate()
        );
    }

    public function testShouldNotBeGreatherThanWhenEqualAbscissa(): void
    {
        $this->thenShouldNotBeGreater(
            self::ABSCISSA,
            self::ORDINATE
        );
    }

    public function testShouldNotBeGreatherThanWhenLesserAbscissa(): void
    {
        $this->thenShouldNotBeGreater(
            self::ABSCISSA - 1,
            self::ORDINATE
        );
    }

    public function testShouldBeGreatherThanWhenGreaterAbscissa(): void
    {
        $this->thenShouldBeGreater(
            self::ABSCISSA + 1,
            self::ORDINATE
        );
    }

    public function testShouldNotBeGreatherThanWhenEqualOrdinate(): void
    {
        $this->thenShouldNotBeGreater(
            self::ABSCISSA,
            self::ORDINATE
        );
    }

    public function testShouldNotBeGreatherThanWhenLesserOrdinate(): void
    {
        $this->thenShouldNotBeGreater(
            self::ABSCISSA,
            self::ORDINATE - 1
        );
    }

    public function testShouldBeGreatherThanWhenGreaterOrdinate(): void
    {
        $this->thenShouldBeGreater(
            self::ABSCISSA,
            self::ORDINATE + 1
        );
    }

    public function testShouldNotBeLesserThanWhenEqualAbscissa(): void
    {
        $this->thenShouldNotBeLesser(
            self::ABSCISSA,
            self::ORDINATE
        );
    }

    public function testShouldNotBeLesserThanWhenGreaterAbscissa(): void
    {
        $this->thenShouldNotBeLesser(
            self::ABSCISSA + 1,
            self::ORDINATE
        );
    }

    public function testShouldBeLesserThanWhenLesserAbscissa(): void
    {
        $this->thenShouldBeLesser(
            self::ABSCISSA - 1,
            self::ORDINATE
        );
    }

    public function testShouldNotBeLesserThanWhenEqualOrdinate(): void
    {
        $this->thenShouldNotBeLesser(
            self::ABSCISSA,
            self::ORDINATE
        );
    }

    public function testShouldNotBeLesserThanWhenGreaterOrdinate(): void
    {
        $this->thenShouldNotBeLesser(
            self::ABSCISSA,
            self::ORDINATE + 1
        );
    }

    public function testShouldBeLesserThanWhenLesserOrdinate(): void
    {
        $this->thenShouldBeLesser(
            self::ABSCISSA,
            self::ORDINATE - 1
        );
    }

    private function thenShouldNotBeGreater(
        int $abscissaValue,
        int $ordinateValue
    ): void {
        $cartesianPointNotGreatherThan = $this->giveCartesianCoordinatePoint(
            $abscissaValue,
            $ordinateValue
        );

        self::assertFalse(
            $cartesianPointNotGreatherThan->isGreatherThan(
                $this->cartesianCoordinatePoint
            )
        );
    }

    private function thenShouldBeGreater(
        int $abscissaValue,
        int $ordinateValue
    ): void {
        $cartesianPointNotGreatherThan = $this->giveCartesianCoordinatePoint(
            $abscissaValue,
            $ordinateValue
        );

        self::assertTrue(
            $cartesianPointNotGreatherThan->isGreatherThan(
                $this->cartesianCoordinatePoint
            )
        );
    }

    private function thenShouldNotBeLesser(
        int $abscissaValue,
        int $ordinateValue
    ): void {
        $cartesianPointNotLesserThan = $this->giveCartesianCoordinatePoint(
            $abscissaValue,
            $ordinateValue
        );

        self::assertFalse(
            $cartesianPointNotLesserThan->isLesserThan(
                $this->cartesianCoordinatePoint
            )
        );
    }

    private function thenShouldBeLesser(
        int $abscissaValue,
        int $ordinateValue
    ): void {
        $cartesianPointLesserThan = $this->giveCartesianCoordinatePoint(
            $abscissaValue,
            $ordinateValue
        );

        self::assertTrue(
            $cartesianPointLesserThan->isLesserThan(
                $this->cartesianCoordinatePoint
            )
        );
    }

    private function giveCartesianCoordinatePoint(
        int $abscissaValue,
        int $ordinateValue
    ): CartesianCoordinatePoint {

        return CartesianCoordinatePoint::create(
            $abscissaValue,
            $ordinateValue
        );
    }
}
