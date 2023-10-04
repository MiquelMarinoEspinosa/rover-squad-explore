<?php

use Core\Rover\Application\RoverSquadExplore\Request\Movement\Cartesian\CartesianMovementExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Request\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Request\RoverSquadExploreRequest;
use Core\Rover\Application\RoverSquadExplore\RoverSquadExploreUseCaseRegistry;

function exploreCartesianCardinalArea($parameters)
{
    $abscissaUpperRightArea = (int) $parameters[0];
    $ordinateUpperRightArea = (int) $parameters[1];

    $roverMovementParamIndex = 2;
    $roverExploreRequests               = [];
    $movementExploreCollectionRequests  = [];

    while ($roverMovementParamIndex < count($parameters)) {
        $movementExploreRequests = [];
        $roverExploreRequests[] = new CartesianCardinalCoordinateRoverExploreRequest(
            $abscissaUpperRightArea,
            $ordinateUpperRightArea,
            (int) $parameters[$roverMovementParamIndex],
            (int) $parameters[$roverMovementParamIndex + 1],
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

    $responses = $response->roverExploreResponses();
    $responsesAsArray = [];

    foreach ($responses as $response) {
        $responsesAsArray[] = [
            'abscissa' => $response->abscissa(),
            'ordinate' => $response->ordinate(),
            'cardinal' => $response->cardinal(),
        ];
    }

    return $responsesAsArray;
}
