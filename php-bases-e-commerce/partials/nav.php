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

$nbPrdCart = 0;
if (isset($_SESSION['cart'])) {
    $nbPrdCart = count($_SESSION['cart']);
}

?>

<nav>
    <div class="nav-part nav-left">
        <a href="index.php" class="<?= 'index' == $page ? 'active' : '' ?>">PHP Bases</a>
        <?php if ($connected) : ?>
            <span style="margin: auto 10px;color: #000000; font-size:larger">Bonjour <?= $_SESSION['user']['firstname'] ?></span>
        <?php endif ?>
    </div>
    <div class=" nav-part nav-right">
        <a href="cart.php" class="<?= 'cart' == $page ? 'active' : '' ?>"><?= $nbPrdCart == 0 ? "Panier" : "Panier (" . $nbPrdCart . ")" ?></a>
        <?php if (!$connected) : ?>
            <a href="login.php" class="<?= 'login' == $page ? 'active' : '' ?>">
            <?php else : ?>
                <a href="logout.php" class="<?= 'login' == $page ? 'active' : '' ?>">
                <?php endif ?>
                <?= $toggleConnexion ?>
                </a>
    </div>
</nav>