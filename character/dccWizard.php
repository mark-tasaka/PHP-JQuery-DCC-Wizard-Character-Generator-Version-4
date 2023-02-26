<!DOCTYPE html>
<html>
<head>
<title>Dungeon Crawl Classics Wizard Character Generator Version 4</title>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
	<meta charset="UTF-8">
	<meta name="description" content="Dungeon Crawl Classics Wizard Character Generator. Goblinoid Games.">
	<meta name="keywords" content="Dungeon Crawl Classics, Goblinoid Games,HTML5,CSS,JavaScript">
	<meta name="author" content="Mark Tasaka 2023">
    
    <link rel="icon" href="../../../../images/favicon/icon.png" type="image/png" sizes="16x16"> 
		

	<link rel="stylesheet" type="text/css" href="css/wizard.css">
    
    
    <script type="text/javascript" src="./js/dieRoll.js"></script>
    <script type="text/javascript" src="./js/modifiers.js"></script>
    <script type="text/javascript" src="./js/hitPoinst.js"></script>
    <script type="text/javascript" src="./js/occupation.js"></script>
    <script type="text/javascript" src="./js/luckySign.js"></script>
    <script type="text/javascript" src="./js/adjustments.js"></script>
    <script type="text/javascript" src="./js/languages.js"></script>
    
    
    
</head>
<body>
    
    <!--PHP-->
    <?php
    
    include 'php/checks.php';
    include 'php/weapons.php';
    include 'php/gear.php';
    include 'php/classDetails.php';
    include 'php/abilityScoreGen.php';
    include 'php/randomName.php';
    include 'php/xp.php';
    include 'php/nameSelect.php';
    include 'php/gender.php';
    include 'php/patron.php';
    include 'php/familiar.php';

    if(isset($_POST["theCharacterName"]))
    {
        $characterName = $_POST["theCharacterName"];

    }

    
    if(isset($_POST["theGivenName"]))
    {
        $givenName = $_POST["theGivenName"];

    }

    if($givenName == '100')
    {
        $givenName = rand(0, 49);
    }
    else
    {
        $givenName = $givenName;
    }
    


    if(isset($_POST["theSurname"]))
    {
        $surname = $_POST["theSurname"];

    }

    if($surname == '100')
    {
        $surname = rand(0, 37);
    }
    else
    {
        $surname = $surname;
    }



    if(isset($_POST['theCheckBoxCustomName']) && $_POST['theCheckBoxCustomName'] == 1) 
    {
        $givenName = 200;
        $surname = 200;
        
    } 
    
    if(isset($_POST["theGender"]))
    {
        $gender = $_POST["theGender"];
    }

    
    $genderName = getGenderName($gender);
    $genderNameIdentifier = genderNameGeneration ($gender);

    $fullName = getName($givenName, $surname, $genderNameIdentifier);


    if(isset($_POST["thePlayerName"]))
    {
        $playerName = $_POST["thePlayerName"];

    }


        if(isset($_POST['theCheckBoxRandomName']) && $_POST['theCheckBoxRandomName'] == 1) 
        {
            $characterName = getRandomName($gender) . " " . getSurname();
        } 


        if(isset($_POST["theAlignment"]))
        {
            $alignment = $_POST["theAlignment"];
        }
    
        if(isset($_POST["theLevel"]))
        {
            $level = $_POST["theLevel"];
        
        } 

        $xpNextLevel = getXPNextLevel ($level);
        
        if(isset($_POST["theAbilityScore"]))
        {
            $abilityScoreGen = $_POST["theAbilityScore"];
        
        } 
        
        $patronArray = array();

        //For Patron
        if(isset($_POST['thePatron']) && $_POST['thePatron'] == 1) 
        {
            $patronNumber = rand(0, 7);
            $patronArray = getPatron($patronNumber);   

            $patronName = $patronArray[0];
            $patronDescription = $patronArray[1];
        }
        else
        {
            $patronName = "";
            $patronDescription = "";

        }


        $familiarForm = array();
        
        //Familiar
        if(isset($_POST['theFamiliar']) && $_POST['theFamiliar'] == 1) 
        {
            $familiarForm = getFamiliar($alignment);

            $familiarFormAnimal = $familiarForm[0];
            $familiarFormDescription = $familiarForm[1];

            $familiarTypeName = getFamiliarType($alignment);
            $familiarType = 'Type: ' . $familiarTypeName;

            $familiarHitPoints = getFamiliarHitPoints($familiarTypeName);
            $familiarHitDice = getFamiliarHitDice($familiarTypeName); 

            $familiarHp = 'HP: ' . $familiarHitPoints . ' ' . $familiarHitDice;

            $familiarPersonalityShort = familiarPersonality();
            $familiarPersonality = 'Personality: ' . $familiarPersonalityShort;

        }
        else
        {
            $familiarFormAnimal = "";
            $familiarFormDescription = "";
            $familiarType = "";
            $familiarHp = "";
            $familiarPersonality = "";

        }
                
    
    $generationMessage = generationMesssage ($abilityScoreGen);
            
    $abilityScoreArray = array();

    if(isset($_POST['theCustomAbilityScore']) && $_POST['theCustomAbilityScore'] == 1) 
    {        
        
        if(isset($_POST["theStrength"]))
        {
            $strengthString = $_POST["theStrength"];
            $strength = intval($strengthString);
        }      

        if(isset($_POST["theAgility"]))
        {
            $agilityString = $_POST["theAgility"];
            $agility = intval($agilityString);
        }     

        if(isset($_POST["theStamina"]))
        {
            $staminaString = $_POST["theStamina"];
            $stamina = intval($staminaString);
        }    

        if(isset($_POST["thePersonality"]))
        {
            $personalityString = $_POST["thePersonality"];
            $personality = intval($personalityString);
        }  

        if(isset($_POST["theIntelligence"]))
        {
            $intelligenceString = $_POST["theIntelligence"];
            $intelligence = intval($intelligenceString);
        }  


        if(isset($_POST["theLuck"]))
        {
            $luckString = $_POST["theLuck"];
            $luck = intval($luckString);
        }  

        $generationMessage = "Custom Ability Scores";
        $optimizeAbilityScoreMessage = "";

    }
    else
    {
        
        for($i = 0; $i < 6; ++$i)
        {
            $abilityScore = rollAbilityScores ($abilityScoreGen);

            array_push($abilityScoreArray, $abilityScore);

        }
        
         $generationMessage = generationMesssage ($abilityScoreGen);

        if(isset($_POST['theOptimizeAbilityScore']) && $_POST['theOptimizeAbilityScore'] == 1) 
        {
            rsort($abilityScoreArray);

            $strength = $abilityScoreArray[5];
            $agility = $abilityScoreArray[4];
            $stamina = $abilityScoreArray[3];
            $personality = $abilityScoreArray[1];
            $intelligence = $abilityScoreArray[0];
            $luck = $abilityScoreArray[2];

            $optimizeAbilityScoreMessage = "<br/>Ability Scores optimized in the order of Int, Per, Luck, Sta, Agi, Str.";
        }
        else
        {
            $strength = $abilityScoreArray[0];
            $agility = $abilityScoreArray[1];
            $stamina = $abilityScoreArray[2];
            $personality = $abilityScoreArray[3];
            $intelligence = $abilityScoreArray[4];
            $luck = $abilityScoreArray[5];
            
            $optimizeAbilityScoreMessage = "";
        } 

    } 
    

    $strengthMod = getAbilityModifier($strength);
    $agilityMod = getAbilityModifier($agility);
    $staminaMod = getAbilityModifier($stamina);
    $personalityMod = getAbilityModifier($personality);
    $intelligenceMod = getAbilityModifier($intelligence);
    $luckMod = getAbilityModifier($luck);

    $nameGenMessage = getNameDescript($givenName, $surname);


       $speed = 30;

       $reflexBase = savingThrowReflex($level);
       $fortBase = savingThrowFort($level);
       $willBase = savingThrowWill($level);

       $criticalDie = criticalDie($level);
       
       $attackBonus = attackBonus($level);

       $actionDice = actionDice($level);

       $title = title($level, $alignment);

       $knownSpells = knownSpells($level);

       $maxSpellLevel = maxSpellLevel($level);

        $weaponArray = array();
        $weaponNames = array();
        $weaponDamage = array();
    
        //For Random Select weapon
        if(isset($_POST['thecheckBoxRandomWeaponsV3']) && $_POST['thecheckBoxRandomWeaponsV3'] == 1) 
        {
            $weaponArray = getRandomWeapons();
        
       }
        else
       {
            if(isset($_POST["theWeapons"]))
            {
                    foreach($_POST["theWeapons"] as $weapon)
                    {
                        array_push($weaponArray, $weapon);
                    }
            }
       }
        
    
    foreach($weaponArray as $select)
    {
        array_push($weaponNames, getWeapon($select)[0]);
    }
        
    foreach($weaponArray as $select)
    {
        array_push($weaponDamage, getWeapon($select)[1]);
    }
        
        $gearArray = array();
        $gearNames = array();
    
    
    //For Random Select gear
    if(isset($_POST['theCheckBoxRandomGear']) && $_POST['theCheckBoxRandomGear'] == 1) 
    {
        $gearArray = getRandomGear();

        $weaponCount = count($weaponArray);

        $hasLongbow = false;
        $hasShortbow = false;

        for($i = 0; $i < $weaponCount; ++$i)
        {
            if($weaponArray[$i] == "12" && $hasShortbow == false)
            {
                array_push($gearArray, 24);
                array_push($gearArray, 25);
                
                $hasLongbow = true;
            }

            if($weaponArray[$i] == "16" && $hasLongbow == false)
            {
                array_push($gearArray, 24);

                $hasShortbow = true;
            }

            if($weaponArray[$i] == "4")
            {
                array_push($gearArray, 26);
            }

            if($weaponArray[$i] == "18")
            {
                array_push($gearArray, 27);
            }


        }

    }
    else
    {
        //For Manually select gear
        if(isset($_POST["theGear"]))
            {
                foreach($_POST["theGear"] as $gear)
                {
                    array_push($gearArray, $gear);
                }
            }

    }


        foreach($gearArray as $select)
        {
            array_push($gearNames, getGear($select)[0]);
        }
    
    
    ?>

    
	
<!-- JQuery -->
  <img id="character_sheet"/>
   <section>
       
		<span id="profession"></span>
           
		<span id="strength"></span>
		<span id="agility"></span> 
		<span id="stamina"></span> 
		<span id="intelligence"></span>
		<span id="personality"></span>
       <span id="luck"></span>
       
       
           
		<span id="strengthMod"></span>
		<span id="agilityMod"></span> 
		<span id="staminaMod"></span> 
		<span id="intelligenceMod"></span>
		<span id="personalityMod"></span>
       <span id="luckMod"></span>

       <span id="reflex"></span>
       <span id="fort"></span>
       <span id="will"></span>
		  
       
       <span id="gender">
           <?php
           echo $gender;
           ?>
       </span>


       
       <span id="dieRollMethod"></span>

       
       <span id="class">Wizard</span>
       
       <span id="armourClass"></span>

       <span id="baseAC"></span>
       
       <span id="hitPoints"></span>

       <span id="languages"></span>
       
       <span id="trainedWeapon"></span>
       <span id="tradeGoods"></span>

       
       <span id="level">
           <?php
                echo $level;
           ?>
        </span>

        
        
       <span id="xpNextLevel">
           <?php
                echo $xpNextLevel;
           ?>
        </span>

       
       

       
       <span id="characterName">
           <?php
                echo $characterName;
           ?>
        </span>
        
       <span id="characterName2">
           <?php
                echo $fullName;
           ?>
        </span>

        
       <span id="playerName">
           <?php
                echo $playerName;
           ?>
        </span>
       
              
         <span id="alignment">
           <?php
                echo $alignment;
           ?>
        </span>
        
        <span id="speed"></span>


        <span id="criticalDieTable">
            <?php
                echo $criticalDie;
            ?>
        </span>

        <span id="initiative">
        </span>

        
        <span id="attackBonus">
        </span>

        
        <span id="actionDice">
            <?php
                echo $actionDice;
            ?>
        </span>

        <span id="spellCheck">
        </span>
        
        <span id="title">
            <?php
                echo $title;
            ?>
        </span>
                
        <span id="knownSpells">
            <?php
                echo $knownSpells;
            ?>
        </span>

        
        <span id="maxSpellLevel">
            <?php
                echo $maxSpellLevel;
            ?>
        </span>
        


        
        <span id="patronName">
            <?php
                echo $patronName;
            ?>
        </span>

        <span id="patronDescription">
            <?php
                echo  $patronDescription;
            ?>
        </span>
        
        
        <span id="familiarForm">
            <?php
                echo  $familiarFormAnimal . '   ' . $familiarFormDescription . '<br/><br/>' . $familiarType . '<br/><br/>' . $familiarHp . '<br/><br/>' . $familiarPersonality;
            ?>
        </span>

        

        
		<p id="birthAugur"><span id="luckySign"></span>: <span id="luckyRoll"></span> (<span id="LuckySignBonus"></span>)</p>
        
        
        <span id="melee"></span>
        <span id="range"></span>
        
        <span id="meleeDamage"></span>
        <span id="rangeDamage"></span>

       
       
       <span id="weaponsList">
           <?php
           
           foreach($weaponNames as $theWeapon)
           {
               echo $theWeapon;
               echo "<br/>";
           }
           
           ?>  
        </span>

       <span id="weaponsList2">
           <?php
           foreach($weaponDamage as $theWeaponDam)
           {
               echo $theWeaponDam;
               echo "<br/>";
           }
           ?>        
        </span>
       

       <span id="gearList">
           <?php

           $gearCount = count($gearNames);
           $counter = 1;
           
           foreach($gearNames as $theGear)
           {
              echo $theGear;

              if($counter == $gearCount-1)
              {
                  echo " & ";
              }
              elseif($counter > $gearCount-1)
              {
                  echo ".";
              }
              else
              {
                  echo ", ";
              }

              ++$counter;
           }
           ?>
       </span>


       <span id="abilityScoreGeneration">
            <?php
           echo $generationMessage . $optimizeAbilityScoreMessage . '<br/>' . $nameGenMessage;
           ?>
       </span>
       


       
	</section>
	

		
  <script>
      

	  
	/*
	 Character() - wizard Character Constructor
	*/
	function Character() {
 
        let strength = <?php echo $strength ?>;
        let	intelligence = <?php echo $intelligence ?>;
        let	personality = <?php echo $personality ?>;
        let agility = <?php echo $agility ?>;
        let stamina = <?php echo $stamina ?>;
        let	luck = <?php echo $luck ?>;
        let strengthMod = <?php echo $strengthMod ?>;
        let intelligenceMod = <?php echo $intelligenceMod ?>;
        let personalityMod = <?php echo $personalityMod ?>;
        let agilityMod = <?php echo $agilityMod ?>;
        let staminaMod = <?php echo $staminaMod ?>;
        let luckMod = <?php echo $luckMod ?>;
        let level = '<?php echo $level ?>';
        let gender = '<?php echo $gender ?>';
	    let	profession = getOccupation();
	    let birthAugur = getLuckySign();
        let bonusLanguages = getBonusLanguages(intelligenceMod, birthAugur, luckMod);
        let attackBonus = <?php echo $attackBonus ?>;
	    let baseAC = getBaseArmourClass(agilityMod) + adjustAC(birthAugur, luckMod);

		let wizardCharacter = {
			"strength": strength,
			"agility": agility,
			"stamina": stamina,
			"intelligence": intelligence,
			"personality": personality,
			"luck": luck,
            "strengthModifer": addModifierSign(strengthMod),
            "intelligenceModifer": addModifierSign(intelligenceMod),
            "personalityModifer": addModifierSign(personalityMod),
            "agilityModifer": addModifierSign(agilityMod),
            "staminaModifer": addModifierSign(staminaMod),
            "luckModifer": addModifierSign(luckMod),
			"profession":  profession.occupation,
            "acBase": baseAC,
			"luckySign": birthAugur.luckySign,
            "luckyRoll": birthAugur.luckyRoll,
            "move": <?php echo $speed ?> + addLuckToSpeed (birthAugur, luckMod),
            "trainedWeapon": profession.trainedWeapon,
            "tradeGoods": profession.tradeGoods,
            "addLanguages": "Common" + bonusLanguages,
            "armourClass": baseAC,
            "hp": getHitPoints (level, staminaMod) + hitPointAdjustPerLevel(birthAugur,  luckMod),
            "attackBonus": attackBonus,
            "spellCheck": <?php echo $level ?> + intelligenceMod,
			"melee": strengthMod + meleeAdjust(birthAugur, luckMod),
			"range": agilityMod + rangeAdjust(birthAugur, luckMod),
			"meleeDamage": strengthMod + meleeDamageAdjust(birthAugur, luckMod),
			"rangeDamage": rangeDamageAdjust(birthAugur, luckMod),
            "reflex": <?php echo $reflexBase ?> + agilityMod + adjustRef(birthAugur, luckMod),
            "fort": <?php echo $fortBase ?> + staminaMod + adjustFort(birthAugur,luckMod),
            "will": <?php echo $willBase ?> + personalityMod + adjustWill(birthAugur, luckMod),
            "initiative": agilityMod + adjustInit(birthAugur, luckMod)

		};
	    if(wizardCharacter.hitPoints <= 0 ){
			wizardCharacter.hitPoints = 1;
		}
		return wizardCharacter;
	  
	  }
	  


  
       let imgData = "images/wizard.png";
      
        $("#character_sheet").attr("src", imgData);
      

      let data = Character();
      
      $("#profession").html(data.profession);
		 
      $("#strength").html(data.strength);
      
      $("#intelligence").html(data.intelligence);
      
      $("#personality").html(data.personality);
      
      $("#agility").html(data.agility);
      
      $("#stamina").html(data.stamina);
      
      $("#luck").html(data.luck);
      
      
		 
      $("#strengthMod").html(data.strengthModifer);
      
      $("#intelligenceMod").html(data.intelligenceModifer);
      
      $("#personalityMod").html(data.personalityModifer);
      
      $("#agilityMod").html(data.agilityModifer);
      
      $("#staminaMod").html(data.staminaModifer);
      
      $("#luckMod").html(data.luckModifer);attackBonus
      
      
      
      $("#dieRollMethod").html(data.dieRollMethod);
            
      $("#hitPoints").html(data.hp);
      
      $("#armourClass").html(data.armourClass);
      
      $("#reflex").html(addModifierSign(data.reflex));
      $("#fort").html(addModifierSign(data.fort));
      $("#will").html(addModifierSign(data.will));
      
      $("#initiative").html(addModifierSign(data.initiative));
      
      $("#speed").html(data.move + "'");
      
      $("#luckySign").html(data.luckySign);
      $("#luckyRoll").html(data.luckyRoll);    
      $("#LuckySignBonus").html(data.luckModifer);

      $("#languages").html(data.addLanguages);
      $("#attackBonus").html(addModifierSign(data.attackBonus));
      $("#spellCheck").html(addModifierSign(data.spellCheck));
      
      $("#melee").html(addModifierSign(data.melee));
      $("#range").html(addModifierSign(data.range));
      $("#meleeDamage").html(addModifierSign(data.meleeDamage));
      $("#rangeDamage").html(addModifierSign(data.rangeDamage));

      
      $("#baseAC").html("(" + data.acBase + ")");
      $("#trainedWeapon").html("Trained Weapon: " + data.trainedWeapon);
      $("#tradeGoods").html("Trade Goods: " + data.tradeGoods);
	 
  </script>
		
	
    
</body>
</html>