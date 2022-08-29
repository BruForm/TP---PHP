<?php
$fichier = "./mon_fichier_text.txt";

if (file_exists($fichier)) {
    $contenu = file_get_contents($fichier);
//    echo $contenu;
    $tad_contenu[] = explode(',', $contenu);
//    var_dump($tad_contenu);
} else {
    file_put_contents($fichier, 'Premiere info');
//    echo "fichier créé !";
}

// Lecture fichier par ligne :
$ressource = fopen($fichier, 'a+');

$poids = filesize($fichier);
if ($poids === 0) {
    $poids = 1;
}
//$contenu = fread($ressource, $poids);
//echo $contenu;
//$contenu = fgets($ressource);
//echo $contenu;

fwrite($ressource, PHP_EOL . "mon nouveau texte");
fclose($ressource);

$ressource = fopen($fichier, 'r');
while ($line = fgets($ressource)) {
    echo $line;
}
fclose($ressource);

echo "\n------------------------------\n";
echo "--- C S V --------------------\n";
echo "------------------------------\n";
// Lecture fichier CSV :
$fichierCSV = "./employees.csv";
$ressourceCSV = fopen($fichierCSV, 'r');

$poids = filesize($fichierCSV);
if ($poids === 0) {
    $poids = 1;
}

while ($line = fgetcsv($ressourceCSV, null, ',')) {
    $tab_csv[] = $line;
}

fclose($ressourceCSV);

var_dump($tab_csv);
