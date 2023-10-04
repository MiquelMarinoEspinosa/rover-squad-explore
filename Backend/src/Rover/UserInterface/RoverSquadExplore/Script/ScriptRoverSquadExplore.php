<?php

use Core\Rover\Application\RoverSquadExplore\Request\Movement\Cartesian\CartesianMovementExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Request\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Request\RoverSquadExploreRequest;
use Core\Rover\Application\RoverSquadExplore\RoverSquadExploreUseCaseRegistry;

function explore($parameters)
{
    $abscissaUpperRightArea = $parameters[0];
    $ordinateUpperRightArea = $parameters[1];

    $roverMovementsParametersLenght = 0;

    foreach ($parameters as $parameter) {
        $roverMovementsParametersLenght++;
    }

    $roverMovementParamIndex = 2;
    $roverExploreRequests               = [];
    $movementExploreCollectionRequests  = [];

    while ($roverMovementParamIndex < $roverMovementsParametersLenght) {
        $movementExploreRequests = [];
        $roverExploreRequests[] = new CartesianCardinalCoordinateRoverExploreRequest(
            $abscissaUpperRightArea,
            $ordinateUpperRightArea,
            $parameters[$roverMovementParamIndex],
            $parameters[$roverMovementParamIndex + 1],
            $parameters[$roverMovementParamIndex + 2]
        );

        foreach (str_split($parameters[$roverMovementParamIndex + 3]) as $movementValue) {
            $movementExploreRequests[] = new CartesianMovementExploreRequest(
                $movementValue
            );
        }
        $movementExploreCollectionRequests[] = $movementExploreRequests;
        $roverMovementParamIndex += 4;
    }

    $roverSquadExploreUseCase = RoverSquadExploreUseCaseRegistry::getInstance()
        ->get('cartesian.coordinate.rover_squad_explore_use_case');

    $request = new RoverSquadExploreRequest(
        $roverExploreRequests,
        $movementExploreCollectionRequests
    );

    $response = $roverSquadExploreUseCase->execute($request);

    return new stdClass;
}

explore($argv);
