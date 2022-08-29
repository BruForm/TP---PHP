<?php

$fileIn = "../data/monText.txt";
if (!file_exists($fileIn)) {
    file_put_contents($fileIn, null);
}
$ressource = fopen($fileIn, 'r');
while ($line = fgets($ressource)) {
    $tabLines[] = $line;
}
fclose($ressource);
