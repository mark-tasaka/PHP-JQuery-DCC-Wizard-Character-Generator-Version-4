<?php

    function getPatron($input)
    {
        $a00 = array("Bobugbubilz,", "The demon lord of amphibians");
        $a01 = array("Azi Dahaka,", "The demon prince of storms and waste");
        $a02 = array("Sezrekan,", "The wickedest of wizards ever to plague the Known World");
        $a03 = array("King of Elfland,", "The Watcher of the dreaming land");
        $a04 = array("The Three Fates,", "The weaver of the collective destinies of the universe");
        $a05 = array("Yddgrrl,", "The World Root");
        $a06 = array("Obitu-que,", "The Lord of the Five");
        $a07 = array("Ithha,", "The Prince of the Elemental Wind");


        $array1= array($a00, $a01, $a02, $a03, $a04, $a05, $a06, $a07);
        
        return $array1[$input];
        
    }

    



?>