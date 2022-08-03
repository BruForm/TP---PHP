<?php
if (!isset($page)) {
    $page = "";
}

$connected = false;
$toggleConnexion = "Connexion";
if (isset($_SESSION['user']) && !empty($_SESSION['user']['email'])) {
    $connected = true;
    $toggleConnexion = "Déconnexion";
}
?>

<nav>
    <div class="nav-part nav-left">
        <a href="index.php" class="<?= 'index' == $page ? 'active' : '' ?>">PHP Bases</a>
        <?php if ($connected) : ?>
            <span style="margin: auto 10px;color: #000000;">Bonjour <?= $_SESSION['user']['firstname'] ?></span>
        <?php endif ?>
    </div>
    <div class=" nav-part nav-right">
        <a href="cart.php" class="<?= 'cart' == $page ? 'active' : '' ?>">Panier(2)</a>
        <?php if (!$connected) : ?>
            <a href="login.php" class="<?= 'login' == $page ? 'active' : '' ?>">
            <?php else : ?>
                <a href="logout.php" class="<?= 'login' == $page ? 'active' : '' ?>">
                <?php endif ?>
                <?= $toggleConnexion ?>
                </a>
    </div>
</nav>