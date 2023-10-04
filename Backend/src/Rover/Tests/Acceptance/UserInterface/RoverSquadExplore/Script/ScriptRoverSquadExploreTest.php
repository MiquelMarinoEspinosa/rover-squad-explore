<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Acceptance\UserInterface\RoverSquadExplore\Script;

use PHPUnit\Framework\TestCase;
use stdClass;

require '/app/src/Rover/UserInterface/RoverSquadExplore/Script/ScriptRoverSquadExplore.php';

final class ScriptRoverSquadExploreTest extends TestCase
{
    public function testShouldRoverSquadExplore(): void
    {
        $params = [
            5, 5,
            1, 2, 'N',
            'LMLMLMLMM',
            3, 3, 'E',
            'MMRMMRMRRM'
        ];

        $response = explore($params);

        self::assertEquals(
            new stdClass,
            $response
        );
    }
}
