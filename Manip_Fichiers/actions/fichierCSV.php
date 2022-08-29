<?php
// Lecture fichier CSV :
$fichierCSV = "../employees.csv";
$ressourceCSV = fopen($fichierCSV, 'r');

$poids = filesize($fichierCSV);
if ($poids === 0) {
    $poids = 1;
}

while ($employee = fgetcsv($ressourceCSV, null, ',')) {
    $tab_employees[] = $employee;
}
fclose($ressourceCSV);


