<?php
session_start();
if (!isset($_SESSION['spy'])) {
    $_SESSION['spy'] = [
        'index' => 0,
        'form' => 0,
        'users' => 0,
        'articles' => 0,
        'connexion' => 0,
    ];
} else {
    $_SESSION['spy']['index']++;
}

include "./data/connexion.php";

// $_SESSION = [];
// session_destroy();

$title = 'Demo PHP view Home';
$styleCSS = "./style.css";
?>

<?php include './partials/header.php' ?>

<div class="container">
    <?php if ($_SESSION['connexion']['connexionOK']) : ?>
        <h1>Bienvenue <?= $_SESSION['connexion']['name'] ?></h1>
    <?php else : ?>
        <h1>Accueil</h1>
    <?php endif ?>
</div>

<?php include './partials/footer.php' ?>