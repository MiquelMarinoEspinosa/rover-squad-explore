<?php

declare(strict_types=1);

namespace Core\RoverControlPanel\Tests\Unit\Domain\Rover\Area\Cartesian\Rectangular;

use PHPUnit\Framework\TestCase;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\CartesianAreaBuilder;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianArea;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianAreaBuilder;
use Core\RoverControlPanel\Domain\Rover\Area\Cartesian\Rectangular\RectangularCartesianAreaBuilderData;

final class RectangularCartesianAreaBuilderTest extends TestCase
{
    private const UPPER_RIGHT_ABSCISSA = 5;
    private const UPPER_RIGHT_ORDINATE = self::UPPER_RIGHT_ABSCISSA;

    public function testShouldInstanciateTheRectangularCartesianAreaBuilder(): void
    {
        $rectangularCartesianAreaBuilder = RectangularCartesianAreaBuilder::getInstance();

        self::assertInstanceOf(
            RectangularCartesianAreaBuilder::class,
            $rectangularCartesianAreaBuilder
        );

        self::assertInstanceOf(
            CartesianAreaBuilder::class,
            $rectangularCartesianAreaBuilder
        );
    }

    public function testShouldReturnTheSameInstanceWhenGetInstanceTwice(): void
    {
        self::assertSame(
            $this->givenRectangularCartesianAreaBuilder(),
            $this->givenRectangularCartesianAreaBuilder()
        );
    }

    public function testShouldBuildTheRectangularCartesianArea(): void
    {
        $rectangularCartesianAreaBuilder = $this->givenRectangularCartesianAreaBuilder();

        $rectangularCartesianAreaBuilderData = $this->givenRectangularCartesianAreaBuilderData();

        $rectangularCartesianArea = $this->whenBuildRectangularCartesianArea(
            $rectangularCartesianAreaBuilder,
            $rectangularCartesianAreaBuilderData
        );

        $this->thenShouldHaveCreatedTheRectangularCartesianArea(
            $rectangularCartesianArea
        );
    }

    private function givenRectangularCartesianAreaBuilder(): RectangularCartesianAreaBuilder
    {
        return RectangularCartesianAreaBuilder::getInstance();
    }

    private function givenRectangularCartesianAreaBuilderData(): RectangularCartesianAreaBuilderData
    {
        return new RectangularCartesianAreaBuilderData(
            self::UPPER_RIGHT_ABSCISSA,
            self::UPPER_RIGHT_ABSCISSA
        );
    }

    private function whenBuildRectangularCartesianArea(
        RectangularCartesianAreaBuilder $rectangularCartesianAreaBuilder,
        RectangularCartesianAreaBuilderData $rectangularCartesianAreaBuilderData
    ): RectangularCartesianArea {

        return $rectangularCartesianAreaBuilder->create(
            $rectangularCartesianAreaBuilderData
        );
    }

    private function thenShouldHaveCreatedTheRectangularCartesianArea(
        RectangularCartesianArea $rectangularCartesianArea
    ): void {
        $expectedRectangularCartesianArea = RectangularCartesianArea::createWithUpperRightCoordinates(
            self::UPPER_RIGHT_ABSCISSA,
            self::UPPER_RIGHT_ORDINATE
        );

        self::assertEquals(
            $expectedRectangularCartesianArea,
            $rectangularCartesianArea
        );
    }
}
