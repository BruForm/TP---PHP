<?php

echo "bonjour \n";
print "test print \n";
print_r(['test', 'du', 'print_r']);

echo "\n\n";

echo "FALSE / TRUE \n";
echo false;
echo true;

echo "\n\n";

echo "VAR_DUMP : \n";
var_dump(["tableau"]);

echo "\n\n";
echo "Declaration de variables : \n";
$varName = "Ma variable";
$age = 20; // int
$money = 69.69; // float
$bool = true;

echo "$varName, $age, $money, $bool \n";
print_r([$varName, $age, $money, $bool]);

echo "\n\n";

//Concatenation
echo "Concatenation : \n";
$name = "Francois";
$age = "29";
$job = "Developpeur";

echo $name . ' a ' . $age . ' ans et il est ' . $job . '.';
echo "\n";
echo "$name a $age ans et il est $job.";
echo "\n";
echo "${name} a ${age} ans et il est ${job}.";
echo "\n";

echo "\n";
$firstPart = "Premiere partie";
$firstPart .= "!";
echo $firstPart;
echo "\n";

echo "\n";
$number = 8;
$number += 5;
echo $number;
echo "\n";
$number -= 3;
echo $number;
echo "\n";
$number /= 2;
echo $number;
echo "\n";
$number *= 3;
echo $number;
echo "\n";
$number++;
echo $number;
echo "\n";
$number--;
echo $number;
echo "\n";
echo "\n";

echo "TABLEAU : \n";
$tab = [1, 2, 3];
$tab2 = array(1, 2, 3);

print_r($tab);
echo "\n";
echo $tab[2];
echo "\n";
echo "\n";
$students = [
    'name' => "toto",
    'age' => 30,
    'email' => "toto@email.fr'"
];
echo $students['name'];
echo "\n";

echo "\n";
var_dump($students);
echo "\n";
var_dump($students['name']);
echo "\n";

echo "\n";
echo "CONDITIONS : \n";
$age = 20;
if ($age == 20) {
}
if ($age === 20) {
}
if ($age > 20) {
}
if ($age >= 20) {
}
if ($age < 20) {
}
if ($age <= 20) {
}
if ($age != 20) {
}
if ($age != 20 && $age > 20 || $age < 20) {
}

echo "\n";
echo "EXISTENCE DE VARAIBLE : \n";
if ($age === null) {
}
if (isset($age)) {
}
$fruits = ['pommes', 'poires', 'scoubidoux'];
if (isset($fruits[27])) {
    echo $fruits[27];
}
echo "\n";
if (isset($fruits[2])) {
    echo $fruits[2];
}
echo "\n";
if (empty($fruits)) {
    echo "Mon tableau est vide";
}
if (!empty($fruits)) {
    echo "Mon tableau n'est pas vide \n";
    print_r($fruits);
}

echo "\n";
echo "\n";
echo "BOUCLES : \n";

for ($i = 0; $i < 10; $i++) {
}

$tabl = ['un', 'deux', 'trois', 'quatre', 'cinq'];
foreach ($tabl as $index => $element) {
    echo "index : $index \n";
    echo "element : $element \n";
}
echo "\n";

echo "\n";
echo "LES FONCTIONS : \n";

function add($a, $b)
{
    return $a + $b;
}
echo add(3, 5);
echo "\n";
echo "3 + 5 = " . add(3, 5);
echo "\n";

function add2(int $a, int $b, int $c = 0): int
{
    return $a + $b + $c;
}
echo add2(5, 7);
echo "\n";
echo add2(5, 7, 3);
echo "\n";

echo "\n";

echo "\n";
