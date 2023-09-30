<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Position\Point\Cartesian;

use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Point;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian\CartesianPoint;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian\CartesianCoordinatePoint;
use Core\RoverControlPanel\Domain\Rover\Position\Point\Cartesian\CartesianCoordinateNotFound;

final class CartesianCoordinatePointTest extends TestCase
{
    private const ABSCISSA_VALUE = 1;
    private const ORDINATE_VALUE = 2;
    private const ABSCISSA_NAME  = 'abscissa';
    private const ORDINATE_NAME  = 'ordinate';

    private CartesianCoordinatePoint $cartesianCoordinatePoint;

    protected function setUp(): void
    {
        $this->cartesianCoordinatePoint = $this->giveCartesianCoordinatePoint(
            self::ABSCISSA_VALUE,
            self::ORDINATE_VALUE
        );
    }

    public function testShouldCreateCartesianCoordinatePoint(): void
    {
        $cartesianCoordinatePoint = $this->giveCartesianCoordinatePoint(
            self::ABSCISSA_VALUE,
            self::ORDINATE_VALUE
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

    public function testShouldReturnTheCoordinateNames(): void
    {
        self::assertSame(
            [
                self::ABSCISSA_NAME,
                self::ORDINATE_NAME
            ],
            $this->cartesianCoordinatePoint->coordinateNames()
        );
    }

    public function testShouldThrowAnExceptionWhenCoordinateNotFound(): void
    {
        self::expectException(CartesianCoordinateNotFound::class);

        $this->cartesianCoordinatePoint->coordinateValue('');
    }

    public function testShouldReturnTheAbscissaCoordinateValue(): void
    {
        self::assertSame(
            self::ABSCISSA_VALUE,
            $this->abscissaValue($this->cartesianCoordinatePoint)
        );
    }

    public function testShouldReturnTheOrdinateCoordinateValue(): void
    {
        self::assertSame(
            self::ORDINATE_VALUE,
            $this->ordinateValue($this->cartesianCoordinatePoint)
        );
    }

    public function testShouldNotMoveAbscissaWhenMoveUp(): void
    {
        $movedCartesianPoint = $this->cartesianCoordinatePoint->moveUp();

        self::assertSame(
            $this->abscissaValue($movedCartesianPoint),
            $this->abscissaValue($this->cartesianCoordinatePoint)
        );
    }

    public function testShouldMoveOrdinateWhenMoveUp(): void
    {
        $movedCartesianPoint = $this->cartesianCoordinatePoint->moveUp();

        self::assertSame(
            $this->ordinateValue($movedCartesianPoint),
            $this->ordinateValue($this->cartesianCoordinatePoint) + 1
        );
    }

    public function testShouldNotMoveAbscissaWhenMoveDown(): void
    {
        $movedCartesianPoint = $this->cartesianCoordinatePoint->moveDown();

        self::assertSame(
            $this->abscissaValue($movedCartesianPoint),
            $this->abscissaValue($this->cartesianCoordinatePoint)
        );
    }

    public function testShouldMoveOrdinateWhenMoveDown(): void
    {
        $movedCartesianPoint = $this->cartesianCoordinatePoint->moveDown();

        self::assertSame(
            $this->ordinateValue($movedCartesianPoint),
            $this->ordinateValue($this->cartesianCoordinatePoint) - 1
        );
    }

    public function testShouldMoveAbscissaWhenMoveRight(): void
    {
        $movedCartesianPoint = $this->cartesianCoordinatePoint->moveRight();

        self::assertSame(
            $this->abscissaValue($movedCartesianPoint),
            $this->abscissaValue($this->cartesianCoordinatePoint) + 1
        );
    }

    public function testShouldNotMoveOrdinateWhenMoveRight(): void
    {
        $movedCartesianPoint = $this->cartesianCoordinatePoint->moveRight();

        self::assertSame(
            $this->ordinateValue($movedCartesianPoint),
            $this->ordinateValue($this->cartesianCoordinatePoint)
        );
    }

    public function testShouldMoveAbscissaWhenMoveLeft(): void
    {
        $movedCartesianPoint = $this->cartesianCoordinatePoint->moveLeft();

        self::assertSame(
            $this->abscissaValue($movedCartesianPoint),
            $this->abscissaValue($this->cartesianCoordinatePoint) - 1
        );
    }

    public function testShouldNotMoveOrdinateWhenMoveLeft(): void
    {
        $movedCartesianPoint = $this->cartesianCoordinatePoint->moveLeft();

        self::assertSame(
            $this->ordinateValue($movedCartesianPoint),
            $this->ordinateValue($this->cartesianCoordinatePoint)
        );
    }

    public function testShouldNotBeGreatherThanWhenEqualAbscissa(): void
    {
        $this->thenShouldNotBeGreater(
            self::ABSCISSA_VALUE,
            self::ORDINATE_VALUE
        );
    }

    public function testShouldNotBeGreatherThanWhenLesserAbscissa(): void
    {
        $this->thenShouldNotBeGreater(
            self::ABSCISSA_VALUE - 1,
            self::ORDINATE_VALUE
        );
    }

    public function testShouldBeGreatherThanWhenGreaterAbscissa(): void
    {
        $this->thenShouldBeGreater(
            self::ABSCISSA_VALUE + 1,
            self::ORDINATE_VALUE
        );
    }

    public function testShouldNotBeGreatherThanWhenEqualOrdinate(): void
    {
        $this->thenShouldNotBeGreater(
            self::ABSCISSA_VALUE,
            self::ORDINATE_VALUE
        );
    }

    public function testShouldNotBeGreatherThanWhenLesserOrdinate(): void
    {
        $this->thenShouldNotBeGreater(
            self::ABSCISSA_VALUE,
            self::ORDINATE_VALUE - 1
        );
    }

    public function testShouldBeGreatherThanWhenGreaterOrdinate(): void
    {
        $this->thenShouldBeGreater(
            self::ABSCISSA_VALUE,
            self::ORDINATE_VALUE + 1
        );
    }

    private function abscissaValue(
        CartesianCoordinatePoint $cartesianCoordinatePoint
    ): int {

        return $this->coordinateValue(
            $cartesianCoordinatePoint,
            self::ABSCISSA_NAME
        );
    }

    private function ordinateValue(
        CartesianCoordinatePoint $cartesianCoordinatePoint
    ): int {

        return $this->coordinateValue(
            $cartesianCoordinatePoint,
            self::ORDINATE_NAME
        );
    }

    private function coordinateValue(
        CartesianCoordinatePoint $cartesianCoordinatePoint,
        string $coordinateName
    ) {

        return $cartesianCoordinatePoint
            ->coordinateValue($coordinateName);
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
