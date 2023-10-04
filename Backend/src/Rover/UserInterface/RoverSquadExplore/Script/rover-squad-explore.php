<?php

require_once('/app/vendor/autoload.php');
require '/app/src/Rover/UserInterface/RoverSquadExplore/Script/ScriptRoverSquadExplore.php';

$responses = exploreCartesianCardinalArea(array_slice($argv, 1));

foreach ($responses as $response) {
    echo $response['abscissa']
        . $response['ordinate']
        . $response['cardinal']
        . PHP_EOL;
}
