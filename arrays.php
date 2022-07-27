<?php

/**
 * Supprime les doublons dans un tableau
 * Exemple :
 * [1, 2, 2, 3, 3, 3, 4, 5, 5]
 * => [1, 2, 3, 4, 5]
 * 
 * Il y a une méthode simple et une méthode complexe
 * @param array $tableau
 * @return void
 */
function deleteDuplicate(array $tableau): array
{
    //return array_unique($tableau);

    $tableauSingle = [];
    foreach ($tableau as $element) {
        if (!in_array($element, $tableauSingle)) {
            array_push($tableauSingle, $element);
        }
    }
    return $tableauSingle;
}

$tableau = [1, 2, 2, 3, 3, 3, 4, 5, 5];
print_r(deleteDuplicate($tableau));
