<?php

echo "\n";
/**
 * La fonction doit retourner un deck de cartes
 * Chaque Carte possède une couleur (Coeur, Carreau, Pique, Trêfle)
 * ainsi qu'une valeur (A, 2, 3, 4, 5, 6, 7, 8, 9, 10, J, D, R)
 *
 * @return array
 */
function generateCardDeck(
    array $colorTab = ['Coeur', 'Carreau', 'Pique', 'Trêfle'],
    array $valueTab = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'V', 'D', 'R', 'A']
): array {
    $cardDeck = [];
    foreach ($colorTab as $color) {
        foreach ($valueTab as $value) {
            array_push($cardDeck, ['color' => $color, 'value' => $value]);
        }
    }
    return $cardDeck;
}

// $colorTab = ['Coeur', 'Carreau', 'Pique', 'Trêfle'];
// $valueTab = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'V', 'D', 'R', 'A'];
print_r(generateCardDeck());
echo "\n------------------------------------------\n";

echo "\n\n";

/**
 * Permet de mélanger un deck de cartes de manière aléatoire.
 * Essayez de trouver comment faire "à la main" sans
 * utiliser "une certaine fonction" qui rendrait ça trop facile :p
 * 
 * @param array $deck
 * @return void
 */
function shuffleDeck(array $deck): array
{
    $tempTab = [];
    $shuffleCardDeck = [];
    $nbCardDeck = count($deck);
    echo "nb carte :" . count($deck) . "\n\n\n";
    $randCardNb = rand(0, $nbCardDeck - 1);

    // for (; $i < $nbCardDeck; $i++) {
    $i = 1;
    while ($i <= $nbCardDeck) {
        if (!in_array($randCardNb, $tempTab)) {
            array_push($shuffleCardDeck, $deck[$randCardNb]);
            array_push($tempTab, $randCardNb);
            $i++;
        }
        $randCardNb = rand(0, $nbCardDeck - 1);
    }
    return $shuffleCardDeck;
}

print_r(shuffleDeck(generateCardDeck()));

echo "\n------------------------------------------\n";
echo "-- Avec la fonction shuffle existante : \n";
$temp = generateCardDeck();
shuffle($temp);
print_r($temp);
echo "\n------------------------------------------\n";

echo "\n\n";
/**
 * Version alternative sans "retour"
 * 
 * !Notez le "&" devant l'argument $deck : cela signifie que le $deck
 * passé sera véritablement modifié par la fonction.
 * function shuffleDeckAlternateVersion(array &$deck): void {}
 */

/**
 * Permet de "piocher" un certain nombre de carte.
 * Il faut que les cartes piochés "disparaissent" du deck
 * et qu'elles se retrouvent dans la "main" du joueur.
 * 
 * On doit pouvoir préciser le nombre de carte à piocher.
 *
 * @param array $deck
 * @param integer $nb
 * @return array
 */
function drawCards(array &$deck, int $nb): array
{
    return [];
}

/**
 * Distribue les cartes d'un jeu de tarot, uniquement pour 4 et 5 joueurs
 * @param int $nbPlayers
 * @param array $deck
 * @return array|null
 */
function dealCards(int $nbPlayers, array $deck): ?array
{
    return [];
}
