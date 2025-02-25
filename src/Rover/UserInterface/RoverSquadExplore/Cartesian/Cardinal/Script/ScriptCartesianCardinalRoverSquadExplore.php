<?php

use Core\Rover\Application\RoverSquadExplore\Request\RoverSquadExploreRequest;
use Core\Rover\Application\RoverSquadExplore\RoverSquadExploreUseCaseRegistry;
use Core\Rover\Application\RoverSquadExplore\Response\RoverSquadExploreResponse;
use Core\Rover\Application\RoverSquadExplore\Request\Movement\Cartesian\CartesianMovementExploreRequest;
use Core\Rover\Application\RoverSquadExplore\Request\Rover\Cartesian\Cardinal\Coordinate\CartesianCardinalCoordinateRoverExploreRequest;

function exploreCartesianCardinalArea($parameters)
{
    $abscissaUpperRightArea = (int) $parameters[0];
    $ordinateUpperRightArea = (int) $parameters[1];

    $roverMovementParamIndex = 2;
    $roverExploreRequests               = [];
    $movementExploreCollectionRequests  = [];

    while ($roverMovementParamIndex < count($parameters)) {
        $movementExploreRequests = [];
        $roverExploreRequests[] = buildCartesianCardinalCoordinateRoverExploreRequest(
            $abscissaUpperRightArea,
            $ordinateUpperRightArea,
            (int) $parameters[$roverMovementParamIndex],
            (int) $parameters[$roverMovementParamIndex + 1],
            $parameters[$roverMovementParamIndex + 2]
        );

        $movementExploreRequests = buildCartesianMovementExploreRequests(
            $parameters[$roverMovementParamIndex + 3]
        );

        $movementExploreCollectionRequests[] = $movementExploreRequests;
        $roverMovementParamIndex += 4;
    }

    $response = explore(
        $roverExploreRequests,
        $movementExploreCollectionRequests
    );
    
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

function buildCartesianCardinalCoordinateRoverExploreRequest(
    int $abscissaUpperRightArea,
    int $ordinateUpperRightArea,
    int $abscissa,
    int $ordinate,
    string $cardinal
): CartesianCardinalCoordinateRoverExploreRequest {
    
    return new CartesianCardinalCoordinateRoverExploreRequest(
        $abscissaUpperRightArea,
        $ordinateUpperRightArea,
        $abscissa,
        $ordinate,
        $cardinal
    );
}

function buildCartesianMovementExploreRequests(
    string $movementValues
): array {
    foreach (str_split($movementValues) as $movementValue) {
        $movementExploreRequests[] = new CartesianMovementExploreRequest(
            $movementValue
        );
    }

    return $movementExploreRequests;
}

function explore(
    array $roverExploreRequests,
    array $movementExploreCollectionRequests
) : RoverSquadExploreResponse {
    $roverSquadExploreUseCase = RoverSquadExploreUseCaseRegistry::getInstance()
        ->get('cartesian.coordinate.rover_squad_explore_use_case');

    $request = new RoverSquadExploreRequest(
        $roverExploreRequests,
        $movementExploreCollectionRequests
    );

    return $roverSquadExploreUseCase->execute($request);
}
