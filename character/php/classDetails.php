<?php

/*Wizard*/

function savingThrowReflex($level)
{
    $reflex = 0;

    if($level >= 1 && $level <= 3)
    {
        $reflex = 1;
    }
    
    if($level >= 4 && $level <= 6)
    {
        $reflex = 2;
    }

    if($level >= 7 && $level <= 9)
    {
        $reflex = 3;
    }

    if($level >= 10)
    {
        $reflex = 4;
    }

    return $reflex;

}


function savingThrowFort($level)
{
    $will = 0;

    if($level >= 3 && $level <= 5)
    {
        $will = 1;
    }
    
    if($level >= 6 && $level <= 8)
    {
        $will = 2;
    }

    if($level >= 9)
    {
        $will = 3;
    }

    return $will;

}


function savingThrowWill($level)
{
    $fort = 0;
    
    if($level >= 1 && $level <= 2)
    {
        $fort = 1;
    }
    
    if($level >= 3 && $level <= 4)
    {
        $fort = 2;
    }
    
    if($level == 5)
    {
        $fort = 3;
    }
    
    if($level >= 6 && $level <= 7)
    {
        $fort = 4;
    }
    
    if($level >= 8 && $level <= 9)
    {
        $fort = 5;
    }
    
    if($level >= 10)
    {
        $fort = 6;
    }
    
    return $fort;

}

function criticalDie($level)
{
    $critical = "";

    if($level == 1 || $level == 2)
    {
        $critical = "1d6/I";
    }

    if($level == 3 || $level == 4)
    {
        $critical = "1d8/I";
    }

    if($level == 5 || $level == 6)
    {
        $critical = "1d10/I";
    }

    if($level == 7 || $level == 8)
    {
        $critical = "1d12/I";
    }
    
    if($level == 9 || $level == 10)
    {
        $critical = "1d14/I";
    }

    return $critical;

}

function attackBonus($level)
{
    $attackBonus = 0;
    
    if($level >= 2 && $level <= 4)
    {
        $attackBonus = 1;
    }

    if($level == 5 || $level == 6)
    {
        $attackBonus = 2;
    }

    if($level == 7 || $level == 8)
    {
        $attackBonus = 3;
    }

    if($level == 9 || $level == 10)
    {
        $attackBonus = 4;
    }

    return $attackBonus;
}


function actionDice($level)
{
    $actionDice = "";

    if($level <= 4)
    {
        $actionDice = "1d20";
    }

    if($level == 5)
    {
        $actionDice = "1d20+1d14";
    }

    if($level == 6)
    {
        $actionDice = "1d20+1d16";
    }

    if($level >= 7 && $level <= 9)
    {
        $actionDice = "1d20+1d20";
    }

    if($level == 10)
    {
        $actionDice = "1d20+1d20+1d14";
    }

    return $actionDice;
}



function title($level, $alignment)
{
    $title = "";

    if($alignment == "Lawful")
    {

        if($level == 1)
        {
            $title = "Evoker";
        }
        else if($level == 2)
        {
            $title = "Controller";
        }
        else if($level == 3)
        {
            $title = "Conjurer";
        }
        else if($level == 4)
        {
            $title = "Summoner";
        }
        else
        {
            $title = "Elementalist";
        }

    }

    if($alignment == "Neutral")
    {
        if($level == 1)
        {
            $title = "Astrologist";
        }
        else if($level == 2)
        {
            $title = "Enchanter";
        }
        else if($level == 3)
        {
            $title = "Magician";
        }
        else if($level == 4)
        {
            $title = "Thaumaturgist";
        }
        else
        {
            $title = "Sorcerer";
        }
    }

    if($alignment == "Chaotic")
    {
        if($level == 1)
        {
            $title = "Cultist";
        }
        else if($level == 2)
        {
            $title = "Shaman";
        }
        else if($level == 3)
        {
            $title = "Diabolist";
        }
        else if($level == 4)
        {
            $title = "Warlock/Witch";
        }
        else
        {
            $title = "Necromancer";
        }
    }

return $title;

}

function knownSpells($level)
{
    $spells = 0;

    switch($level)
    {
        case 1:
            $spells = 4;
        break;

        case 2:
            $spells = 5;
        break;
        
        case 3:
            $spells = 6;
        break;
        
        case 4:
            $spells = 7;
        break;

        case 5:
            $spells = 8;
        break;
        
        case 6:
            $spells = 9;
        break;
        
        case 7:
            $spells = 10;
        break;

        case 8:
            $spells = 12;
        break;
        
        case 9:
            $spells = 14;
        break;
        
        case 10:
            $spells = 16;
        break;

        default:
        $spells = 0;


    }

    return $spells;
}

function maxSpellLevel($level)
{
    $spellLevel = 0;

    if($level == 1 || $level == 2)
    {
        $spellLevel = 1;
    }

    if($level == 3 || $level == 4)
    {
        $spellLevel = 2;
    }

    if($level == 5 || $level == 6)
    {
        $spellLevel = 3;
    }

    if($level == 7 || $level == 8)
    {
        $spellLevel = 4;
    }
    
    if($level == 9 || $level == 10)
    {
        $spellLevel = 5;
    }

    return $spellLevel;
}


?>