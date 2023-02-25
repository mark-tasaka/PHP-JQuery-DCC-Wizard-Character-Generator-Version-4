<?php

/*Wizard*/


    function getWeapon($input)
    {
        $a00 = array("Dagger", "1d4/1d10");
        $a01 = array("Longbow", "1d6");
        $a02 = array("Longsword", "1d8");
        $a03 = array("Shortbow", "1d6");
        $a04 = array("Short sword", "1d6");
        $a05 = array("Staff", "1d4");


        $array1= array($a00, $a01, $a02, $a03, $a04, $a05);
        
        return $array1[$input];
        
    }

    
    
function getRandomWeapons()
{
   
    $weaponsArray = array(0, 1, 2, 3, 4, 5);

    //shuffle $weaponsArray
    shuffle($weaponsArray); 

    $numberOfWeapons = rand (3, 5);

    $weaponsHas = array();

    for($j = 0; $j < $numberOfWeapons; ++$j)
    {
        $weapon = $weaponsArray[$j];
        array_push($weaponsHas, $weapon);
    }

    return $weaponsHas;
}




?>