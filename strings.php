<?php
echo "\n";

/**
 * Doit retourner un "extrait" d'une chaine de caractères.
 * Si la chaine est plus longue que 15 caractères, on ne
 * doit afficher que les 15 premiers suivis de "..."
 *
 * @param [type] $string
 * @return string
 */
function getExcerpt(string $string): string
{
    echo "str_split : " . str_split($string, 15)[0] . "... \n";

    $string = substr($string, 0, 15);
    echo "substr : " . $string . "... \n";

    return $string;
}
// $test = "qsdfhj mze zregt ZSE zer gqzerg ";
$test = readline("entrez le texte à couper : ");
getExcerpt($test);

echo "\n";
/**
 * Faire une fonction qui permet d'ajouter des 'fe' 
 * après chaque voyelle d'une chaîne de caractère,
 * et répéter la voyelle précédente, passée en paramètre
 * 
 * exmple : transform("Bonjour") => "Bofeonjofeoufeur"
 * @param string $string
 * @return string
 */
function transform(string $string, string $repl): string
{
    $tabTrans = [
        'a' => 'a' . $repl . 'a',
        'e' => 'e' . $repl . 'e',
        'i' => 'i' . $repl . 'i',
        'o' => 'o' . $repl . 'o',
        'u' => 'u' . $repl . 'u',
        'y' => 'y' . $repl . 'y'
    ];
    echo strtr($string, $tabTrans) . "\n";
    return strtr($string, $tabTrans);
}
$string = readline("entrez le mot à transformer : ");
$transf = readline("entrez le text pour la transformation : ");
transform($string, $transf);

echo "\n";
/**
 * Doit vérifier la validité d'un mot de passe.
 * Un mot de passe est valide si il
 * -contient 9 caractères ou plus
 * -contient le symbole "@"
 *
 * @param string $password
 * @return boolean
 */
function verifyPassword(string $password): bool
{
    // if (strlen($password) < 9) {
    //     echo "Le mot de passe doit contenir au moins 9 caractères ! \n";
    //     return false;
    // }
    // if (!str_contains($password, '@')) {
    //     echo "Le mot de passe doit contenir au moins un caractère '@' ! \n";
    //     return false;
    // }
    if (strlen($password) < 9 || !str_contains($password, '@')) {
        echo "Le mot de passe doit contenir au moins :\n   - 9 caractères\n   - 1 caractère '@' \n";
        return false;
    }
    return true;
}
$password = readline("entrez le mot de passe à tester : ");
while (!verifyPassword($password)) {
    $password = readline("entrez le mot de passe à tester : ");
};

echo "\n\n";