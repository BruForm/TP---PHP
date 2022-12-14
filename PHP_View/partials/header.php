<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="<?= $styleCSS; ?>">
    <link rel="stylesheet" href="../partials/header.css">
    <!-- <script src="script.js" defer></script> -->

    <title><?= $title ?></title>
</head>

<body>
    <div class="header">
        <ul class="nav">
            <a href="../index.php">ACCUEIL</a>
            <a href="../pages/users.php">USERS</a>
            <a href="../pages/form.php">FORM</a>
            <a href="../pages/articles.php?page=1">ARTICLES</a>
            <?php if (
                $_SESSION['connexion']['connexionOK']
                && $_SESSION['connexion']['adminOK']
            ) : ?>
                <a href="../pages/admin.php">ADMIN</a>
            <?php endif ?>
            <a class="connect" href="../pages/connexion.php">CONNEXION</a>
        </ul>
        <div class="spyInfos">
            <p>Nombre de visite des pages :</p>
            <ul>
                <li>Accueil : <?= $_SESSION['spy']['index'] ?></li>
                <li>Users : <?= $_SESSION['spy']['users'] ?></li>
                <li>Form : <?= $_SESSION['spy']['form'] ?></li>
                <li>Articles : <?= $_SESSION['spy']['articles'] ?></li>
                <li>Connexion : <?= $_SESSION['spy']['connexion'] ?></li>
                <li>
                    <form action="../data/empty_&_session.php">
                        <input type="submit" value="/!\ Vider $_SESSION /!\">
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <hr>