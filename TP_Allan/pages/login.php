<?php
session_start();

include '../data/users.php';

var_dump($_POST);

if ((isset($_POST['email']) && !empty($_POST['email']))
    && (isset($_POST['password']) && !empty($_POST['password']))
) {
    $email = $_POST['email'];
    $password  = $_POST['password'];

    foreach ($users as $user) {
        if ($email === $user['email'] && $password === $user['password']) {
            $_SESSION['user'] = $user;
            break 1;
            // Mettre un numéro apres le break permet de donner le niveau du "foreach" que l'on veut breaker. 
            // Utile lorsqu'on imbrique les boucles pour breaker plusieurs boucles en une fois
        }
    }

    if (!isset($_SESSION['user'])) $error = true;
    else {
        header('location: ../index.php');
    }
};

var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP_TP_Allan_Login</title>
</head>

<body>
    <a href="/" style="border: 2px solid #000000; text-decoration: none; padding: 2px 5px;">HOME</a>
    <br><br>
    <form action="" method="POST">
        <?php if (isset($error)) : ?>
            <p style="color: red;">Identifiants invalides !</p>
        <?php endif ?>
        <label for="email">E-mail</label>
        <br>
        <input type="email" name="email" id="email">
        <br>
        <label for="password">Mot de passe</label>
        <br>
        <input type="password" name="password" id="password">
        <br>
        <button type="submit">Se connecter</button>
    </form>
</body>

</html>