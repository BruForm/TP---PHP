<?php

echo "EXO1 - 1 \n";

//echo date('Y');
function birthYear(int $age): int
{
    date('Y');
    return date('Y') - $age;
}
echo "Annee de naissance " .  birthYear(43);

//--------------------------------------------------------------------------------------------------------
echo "\n\n";
echo "EXO1 - 2 \n";

function moyenneTab(array $tab): float
{
    $total = 0;
    $moyenne = 0;
    // $i = 0;
    // while ($i < count($tab)) {
    //     $total += $tab[$i];
    //     $i++;
    // }
    foreach ($tab as $index => $note) {
        $total += $note;
    }
    $moyenne = $total / count($tab);
    return $moyenne;
}
echo "la moyenne du tableau [ 12, 15, 19, 2] est : " .  moyenneTab([12, 15, 19, 2]);

//--------------------------------------------------------------------------------------------------------
echo "\n\n";
echo "EXO1 - 3 \n";

function calcTTC(float $pxUnit, int $nbPrd, float $taxes = 19.6): float
{
    $res = 0;
    $res = round(($pxUnit * $nbPrd) * (($taxes / 100) + 1), 2);
    return $res;
}
echo 'Résultat exo3 le prix ttc est de : ' . calcTTC(24.35, 12);

//--------------------------------------------------------------------------------------------------------
echo "\n\n";
echo "EXO1 - 4 \n";

function state(float $temp): string
{
    $state = '';
    switch (true) {
        case ($temp <= 0):
            $state  = 'Solide';
            break;
        case ($temp > 0 && $temp < 100):
            $state = 'Liquide';
            break;
        case ($temp >= 100):
            $state  = 'Gazeux';
            break;
    }
    return $state;
}
echo 'Résultat exo4 eau à -69.69° : ' . state(-69.69);

//--------------------------------------------------------------------------------------------------------
echo "\n\n";
echo "EXO1 - 5 \n";

$studentNotes = [
    ['name' => 'Albert', 'notes' => [12, 8, 9, 7, 13]],
    ['name' => 'Michel', 'notes' => [14, 13, 12, 11, 10]],
    ['name' => 'Vincent', 'notes' => [17, 16, 15, 18, 13]],
];

function moyenneEtudiants(array $studentNotes): array
{
    $tabRet = [];
    foreach ($studentNotes as $index => $student) {
        $moyenne = moyenneTab($student['notes']);
        array_push($tabRet, ['name' => $student['name'], 'moyenne' => $moyenne]);
    }
    return $tabRet;
}
echo "Résultat exo6 : \n";
foreach (moyenneEtudiants($studentNotes) as $index => $stuNotes) {
    echo $stuNotes['name'] . 'a une moyenne de ' . $stuNotes['moyenne'] . "\n";
}
// print_r(moyenneEtudiants($studentNotes));

//--------------------------------------------------------------------------------------------------------
echo "\n\n";
echo "EXO1 - 6 \n";

function addPercent(float $price, float $percent): float
{
    $ret = round($price * (1 + $percent / 100), 2);
    return $ret;
}
echo 'Résultat exo6 69€ + 10% : ' . addPercent(69.0, 10.0);

//--------------------------------------------------------------------------------------------------------
echo "\n\n";
echo "EXO - LE COMBAT DES HEROS \n";

function createHero(
    string $key1,
    string $key2,
    string $key3,
    string $value1,
    int $value2,
    int $value3,
    array &$heroes
): array {
    $hero = [$key1 => $value1, $key2 => $value2, $key3 => $value3];
    array_push($heroes, $hero);
    return $hero;
}

$heroes = [];
// array_push($heroes, createHero('name', 'hp', 'damages', 'Warrior', 540, 25));
// array_push($heroes, createHero('name', 'hp', 'damages', 'Mage', 430, 31));

createHero('name', 'hp', 'damages', 'Warrior', 540, 25, $heroes);
createHero('name', 'hp', 'damages', 'Wizard', 430, 31, $heroes);

// print_r($heroes);


function displayHero(array $hero, int $nbData = 3)
{
    echo "* Nom : " . $hero['name'] . "\n";
    if ($nbData >= 2) {
        echo "* Point de vie : " . $hero['hp'] . "\n";
        if ($nbData === 3) {
            echo "* degats : " . $hero['damages'] . "\n";
        }
    }
    echo "\n";
}

function displayHeroes(array $heroes, int $nbData = 3)
{
    foreach ($heroes as $index => $hero) {
        displayHero($hero, $nbData);
    }
}

displayHeroes($heroes);

// 1 attaque 2
// function oneVsTwo(array $hero1, array $hero2): bool
function oneVsTwo(array &$hero1, array &$hero2): bool
{
    $hero2['hp'] -= $hero1['damages'];
    echo $hero1['name'] . " inflige " . $hero1['damages'] . " domages à " . $hero2['name'] . "\n";
    displayHero($hero1, 2);
    displayHero($hero2, 2);

    if ($hero2['hp'] <= 0) {
        echo "- - - - - - - - - - - - - - - - - -\n";
        echo $hero2['name'] . " a péri sous les coups de " . $hero1['name'] . "!\n";
        echo "- - - - - - - - - - - - - - - - - -\n\n";
        // return ['win' => true, 'hp' => $hero2['hp']];
        return true;
    }
    // return ['win' => false, 'hp' => $hero2['hp']];
    return false;
}

function fight(array $heroes1, array $heroes2)
{
    $i1 = 0;
    $i2 = 0;
    while ($i1 < count($heroes1) && $i2 < count($heroes2)) {

        // // 1 attaque 2
        // $heroes2[$i2]['hp'] -= $heroes1[$i1]['damages'];
        // echo $heroes1[$i1]['name'] . " inflige " . $heroes1[$i1]['damages'] . " domages à " . $heroes2[$i2]['name'] . "\n";
        // displayHero($heroes1[$i1], 2);
        // displayHero($heroes2[$i2], 2);

        // // si 2 est mort on passe au combatant suivant
        // if ($heroes2[$i2]['hp'] <= 0) {
        //     echo "- - - - - - - - - - - - - - - - - -\n";
        //     echo $heroes2[$i2]['name'] . " a péri sous les coups de " . $heroes1[$i1]['name'] . "!\n";
        //     echo "- - - - - - - - - - - - - - - - - -\n\n";
        //     $i2++;
        // }

        // 1 attaque 2
        // $res = oneVsTwo($heroes1[$i1], $heroes2[$i2]);
        $won = oneVsTwo($heroes1[$i1], $heroes2[$i2]);
        // print_r($heroes2[$i2]);
        // $heroes2[$i2]['hp'] = $res['hp'];
        // if ($res['win']) {
        if ($won) {
            $i2 ++;
        }

        // sinon 2 attaque 1
        else {
            // $heroes1[$i1]['hp'] -= $heroes2[$i2]['damages'];
            // echo $heroes2[$i2]['name'] . " inflige " . $heroes2[$i2]['damages'] . " domages à " . $heroes1[$i1]['name'] . "\n";
            // displayHero($heroes2[$i2], 2);
            // displayHero($heroes1[$i1], 2);

            // if ($heroes1[$i1]['hp'] <= 0) {
            //     echo "- - - - - - - - - - - - - - - - - -\n";
            //     echo $heroes1[$i1]['name'] . " a péri sous les coups de " . $heroes2[$i2]['name'] . "!\n";
            //     echo "- - - - - - - - - - - - - - - - - -\n\n";
            //     $i1++;
            // }

            // $res = oneVsTwo($heroes2[$i2], $heroes1[$i1]);
            $won = oneVsTwo($heroes2[$i2], $heroes1[$i1]);
            // $heroes1[$i1]['hp'] = $res['hp'];
            // if ($res['win']) {
            if ($won) {
                $i1 ++;
            }
        }
    }

    // afficher l'equipe gagnante
    echo "-----------------------------------\n";
    if ($i1 < count($heroes1)) {
        echo "- L'équipe de Heros n°1 a gagné ! -" . "\n";
    }
    if ($i2 < count($heroes2)) {
        echo "- L'équipe de Heros n°2 a gagné ! -" . "\n";
    }

    echo "- - - - - - - - - - - - - - - - - -\n";
    displayHeroes($heroes1, 2);
    displayHeroes($heroes2, 2);
    echo "-----------------------------------\n\n";
}

echo "-----------------------------------\n";
echo "--     Le combat des héros       --\n";
echo "-----------------------------------\n";
$equipe1 = [];
$equipe2 = [];

// array_push($equipe1, createHero('name', 'hp', 'damages', 'eq1 : Luke', 540, 25));
// array_push($equipe1, createHero('name', 'hp', 'damages', 'eq1 : Obi Wan', 530, 31));
// array_push($equipe1, createHero('name', 'hp', 'damages', 'eq1 : Han Solo', 220, 10));
// array_push($equipe2, createHero('name', 'hp', 'damages', 'eq2 : Darth Maul', 490, 28));
// array_push($equipe2, createHero('name', 'hp', 'damages', 'eq2 : Darth Vader', 590, 35));
createHero('name', 'hp', 'damages', 'eq1 : Luke', 540, 25, $equipe1);
createHero('name', 'hp', 'damages', 'eq1 : Obi Wan', 530, 31, $equipe1);
createHero('name', 'hp', 'damages', 'eq1 : Han Solo', 220, 10, $equipe1);
createHero('name', 'hp', 'damages', 'eq2 : Darth Maul', 490, 28, $equipe2);
createHero('name', 'hp', 'damages', 'eq2 : Darth Vader', 590, 35, $equipe2);

displayHeroes($equipe1, 3);
displayHeroes($equipe2, 3);
echo "- - - - - - - - - - - - - - - - - -\n";
fight($equipe1, $equipe2);

//--------------------------------------------------------------------------------------------------------