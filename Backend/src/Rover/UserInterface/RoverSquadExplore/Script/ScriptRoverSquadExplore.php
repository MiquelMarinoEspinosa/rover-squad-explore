<?php

function explore($parameters) {
    $abscissaUpperRightArea = $parameters[0];
    $ordinateUpperRightArea = $parameters[1];

    var_dump($abscissaUpperRightArea);
    var_dump($ordinateUpperRightArea);

    var_dump($parameters);
    //var_dump(count($parameters));

    unset($parameters[0]);
    unset($parameters[1]); 
    $roverMovementsParametersLenght = 0;
    
    foreach ($parameters as $parameter)
    {
        $roverMovementsParametersLenght++;
    }

    $paramIndex = 2;
    
    while ($paramIndex < $roverMovementsParametersLenght)
    {
        var_dump($parameters[$paramIndex]);
        var_dump($parameters[$paramIndex + 1]);
        var_dump($parameters[$paramIndex + 2]);
        var_dump($parameters[$paramIndex + 3]);
        $paramIndex = $paramIndex + 4;
    }


    return new stdClass;
}

explore($argv);