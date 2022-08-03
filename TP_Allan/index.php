<?php
session_start();

include './data/users.php';

// echo 'email : ' . $_SESSION['user']['email'] . '<br>';
// echo 'password : ' . $_SESSION['user']['password'] . '<br>';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP_TP_Allan</title>
</head>

<body>

    <a href="/pages/login.php" style="border: 2px solid #000000; text-decoration: none; padding: 2px 5px;">LOGIN</a>

    <?php if (isset($_SESSION['user'])) : ?>
        <h3> Bonjour <?= $_SESSION['user']['name']?> </h3>
    <?php endif ?>

    <br><br><br><br><br><br>
    <?php if (isset($_SESSION['user'])) : ?>
        <a href="/pages/logout.php" style="border: 2px solid #000000; text-decoration: none; padding: 2px 5px;">Se déconnecter !</a>
    <?php endif ?>

</body>

</html>