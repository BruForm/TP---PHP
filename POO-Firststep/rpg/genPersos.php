<?php
namespace App;
use App\Monster;
use App\Warrior;
use App\Wizzard;

require_once "../rpg/actions/fighting.php";

//------------------------------------------------------------------

// -- name / hp / mp / attack / defense / shield (t/f)/ agility / chance
$musclor = new Warrior("Musclor", 70, 20, 25, 40, true, 20, 15);
// var_dump($musclor);

$gandoulf = new Wizzard("Gandoulf", 60, 65, 10, 30, true, 35, 25);
// var_dump($gandoulf);

$headbutt = new Monster("Headbutt", 50, 0, 20, 35, true, 10, 05);
// var_dump($headbutt);

fight($musclor, $headbutt);
