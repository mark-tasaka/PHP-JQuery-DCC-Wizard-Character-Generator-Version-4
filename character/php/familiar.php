<?php
/* Wizard/Elf classes Familiar */

function getLawFamiliar($input)
{
    $a00 = array("Eagle", "(excellent vision)");
    $a01 = array("White Cat", "(move very silently)");
    $a02 = array("Hawk", "(excellent vision)");
    $a03 = array("Brownie", "(excellent at hiding in forest)");
    $a04 = array("Miniature Armoured Knight", "(+1 AC)");
    $a05 = array("Giant Bee", "(melee attacks deal extra +1 stinging damage)");
    $a06 = array("Faithful Hound", "(all followers, retainers, etc. receive +2 to morale checks)");
    $a07 = array("Giant Ant", "(+1 to all attempts at ESP, telepathy, scrying, etc.)");
    $a08 = array("Extraplanar Ant", "(+1 to all attempts at planar travel)");
    $a09 = array("Miniature Version of Wizard", "(extra life)");
    $a10 = array("Giant Wasp", "(melee attacks deal poison: Fort DC 12 or temporary loss of 1 Str)");
    $a11 = array("Miniature Robed Wizard", "(+1 to spell checks on one randomly determined spell)");
    $a12 = array("Miniature Gorilla", "(+1 Strength)");
    $a13 = array("Miniature Youthful Version of Wizard", "(+1 stamina)");

    $array1= array($a00, $a01, $a02, $a03, $a04, $a05, $a06, $a07, $a08, $a09, $a10, $a11, $a12, $a13);
    
    return $array1[$input];
    
}


function getNeutralFamiliar($input)
{
    $a00 = array("Badger", "(melee attacks deal extra +1 damage)");
    $a01 = array("Wolverine", "(+2 hit points)");
    $a02 = array("Owl", "(can see at night; excellent hearing)");
    $a03 = array("Pixie", "(excellent at hiding in forest)");
    $a04 = array("Miniature Minotaur", "(+1 Strength)");
    $a05 = array("Giant Cricket", "(loud, commanding voice)");
    $a06 = array("Lizard", "(40’ movement)");
    $a07 = array("Turtle", "(+2 AC but movement reduced by -5’)");
    $a08 = array("Toad", "(can breathe underwater for up to 20 minutes)");
    $a09 = array("Tiny Elemental", "(+1 to all checks/saves relating to that element)");
    $a10 = array("Crow", "(uncanny ability to detect gems and shiny objects)");
    $a11 = array("Horned Slug", "(melee attack causes paralysis: Fort DC 12 or paralyzed for 1d4+CL rounds)");
    $a12 = array("Giant Beetle", "(+1 AC)");
    $a13 = array("Rat", "(120’ infravision)");

    $array1= array($a00, $a01, $a02, $a03, $a04, $a05, $a06, $a07, $a08, $a09, $a10, $a11, $a12, $a13);
    
    return $array1[$input];
    
}



function getChaosFamiliar($input)
{
    $a00 = array("Giant Centipede", "(10’ climb speed)");
    $a01 = array("Black Cat", "(move very silently)");
    $a02 = array("Bat", "(excellent hearing)");
    $a03 = array("Cobra", "poisoned bite; DC 16 Fort save or lose 1d6 Stamina)");
    $a04 = array("Tarantula", "(melee attacks deal poison: Fort DC 14 or temporary loss of 1 Agility)");
    $a05 = array("Weasel", "(supernatural ability to squeeze into tight places)");
    $a06 = array("Spider Monkey", "(20’ climb speed)");
    $a07 = array("Pseudo-dragon", "(breath weapon 1/day: cone, 20’ long x 10’ wide, 2d6 fire damage)");
    $a08 = array("Miniature woman of extraordinary beauty", "(+2 Personality)");
    $a09 = array("Python", "(melee attack causes constriction; see pg 318)");
    $a10 = array("Tiny Viper", "(extraordinary sense of smell)");
    $a11 = array("Tiny Demon", "+2 Luck; restores naturally each night)");
    $a12 = array("Scorpion", "(+2 to Fort saves vs. poison)");
    $a13 = array("Skeletal rat", "(+1 damage against un-dead)");

    $array1= array($a00, $a01, $a02, $a03, $a04, $a05, $a06, $a07, $a08, $a09, $a10, $a11, $a12, $a13);
    
    return $array1[$input];
    
}

function getFamiliar($alignment)
{
    $familiarArray = array();

    $input = rand(0, 13);

    if($alignment === "Lawful")
    {
        $familiarArray = getLawFamiliar($input);
    }
    
    if($alignment === "Neutral")
    {
        $familiarArray = getNeutralFamiliar($input);
    }

    
    if($alignment === "Chaotic")
    {
        $familiarArray = getChaosFamiliar($input);
    }

    return $familiarArray;
}


function familiarPersonality()
{
    $number = rand(0, 19);
    $personality;

    if($number < 19)
    {
        $personalityArray = array('Grumpy', 'Angry', 'Eager and curious', 'Complains constantly about creaky joints','Cranky', 'Narcissistic', 'Wide', 'Vapid', 'Garrulous', 'Stingy', 'Jolly', 'Introspective', 'Convivial', 'Lazy', 'Aloof', 'Charitable', 'Sexy', 'Mellow', 'Sleepy');

        shuffle($personalityArray);

        $personality = $personalityArray[0];

    }
    else
    {
        $subjectArray = array('opposite sex', 'gnomes', 'clouds', 'flowers', 'pancakes', 'leather armour');

        shuffle($subjectArray);

        $personality = 'Normally mellow but becomes inexplicably animated when discussing ' . $subjectArray[0];

    }

    return $personality;

}


function getFamiliarType($alignment)
{

    $familiarArray = array('Guardian', 'Focal', 'Arcane', 'Demonic');

    $familiarType;
    $dieRoll = rand(0, 30);

    if($alignment === "Lawful")
    {
        if($dieRoll < 20)
        {
            $familiarType = $familiarArray[0];
        }
        else if ($dieRoll >= 20 && $dieRoll < 30)
        {
            $familiarType = $familiarArray[1];
        }
        else
        {
            $familiarType = $familiarArray[2];
        }

    }
    
    if($alignment === "Neutral")
    {
        if($dieRoll < 20)
        {
            $familiarType = $familiarArray[0];
        }
        else if ($dieRoll >= 20 && $dieRoll < 25)
        {
            $familiarType = $familiarArray[2];
        }
        else if ($dieRoll >= 25 && $dieRoll < 30)
        {
            $familiarType = $familiarArray[3];
        }
        else
        {
            $familiarType = $familiarArray[3];
        }

    }

    
    if($alignment === "Chaotic")
    {
        if($dieRoll < 20)
        {
            $familiarType = $familiarArray[0];
        }
        else if ($dieRoll >= 20 && $dieRoll < 25)
        {
            $familiarType = $familiarArray[3];
        }
        else if ($dieRoll >= 25 && $dieRoll < 30)
        {
            $familiarType = $familiarArray[2];
        }
        else
        {
            $familiarType = $familiarArray[1];
        }

    }

    return $familiarType;

}

function getFamiliarHitPoints ($familiarType)
{
    if($familiarType === "Guardian")
    {
        $hitPoints = rand(6, 12);
    }
    else
    {
        $hitPoints = rand(3, 6);

    }

    return $hitPoints;
}


function getFamiliarHitDice ($familiarType)
{
    if($familiarType === "Guardian")
    {
        $hitDice = "(2d4+4)";
    }
    else
    {
        $hitDice = "(1d4+2)";

    }

    return $hitDice;
}


?>


