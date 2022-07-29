<?php
session_start();
if (isset($_SESSION['spy'])) {
    $_SESSION['spy']['connexion']++;
}

include '../data/connexion.php';

$title = 'Demo PHP view CONNEXION';
$styleCSS = 'connexion.css';

// echo "<pre>" . var_dump($_POST) . "</pre>";
// echo "<pre>" . var_dump($_SESSION['connexion']) . "</pre>";

?>


<!-- HEADER -->
<?php include '../partials/header.php' ?>

<!-- BODY -->
<div class="container">
    <h3>Bienvenu sur la page de connexion</h3>

    <div class="error">
        <?php
        foreach ($_SESSION['connexion']['error'] as $error) {
            echo "<h3>" . $error . "</h3>";
        }
        ?>
    </div>

    <form action="../actions/connexion.php" method="POST">
        <!-- <form action="connexion.php" method="POST"> -->

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        </div>

        <div>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>

        <input type="submit" value="submit" name="submit">

    </form>

</div>
<!-- FOOTER -->
<?php include '../partials/footer.php' ?>