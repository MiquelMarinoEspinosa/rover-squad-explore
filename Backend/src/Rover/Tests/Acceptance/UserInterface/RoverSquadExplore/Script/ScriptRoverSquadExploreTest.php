<?php

declare(strict_types=1);

namespace Core\Rover\Tests\Acceptance\UserInterface\RoverSquadExplore\Script;

use PHPUnit\Framework\TestCase;
use stdClass;

require '/app/src/Rover/UserInterface/RoverSquadExplore/Script/ScriptRoverSquadExplore.php';

final class ScriptRoverSquadExploreTest extends TestCase
{
    public function testScript(): void
    {        
        $response = explore(1, 2);

        self::assertEquals(
            new stdClass,
            $response
        );
    }
}
