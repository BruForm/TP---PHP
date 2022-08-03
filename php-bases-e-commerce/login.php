<?php
session_start();

include './data/users.php';

$page = 'login';
$pageTitle = "Connexion";
$customCssLinks = ['<link rel="stylesheet" href="/assets/login.css">'];

$error = null;
if ((isset($_GET['email']) && !empty($_GET['email']))
    && (isset($_GET['password']) && !empty($_GET['password']))
) {
    foreach ($users as $user) {
        if ($user['email'] === $_GET['email']) {

            if (password_verify($_GET['password'], $user['password'])) {
                $_SESSION['user'] = $user;
                header('location: ./index.php');
                break 1;
            } else $error = "Les informations saisies sont incorrectes !";
        } 
    }
}


?>

<?php include('./partials/header.php'); ?>
<main class="login-main">
    <form method="GET" class="login-form" action="">
        <h1 class="page-title"><?= $pageTitle ?></h1>
        <h4 style="text-align: center;">
            <?php if (!is_null($error)) : ?>
                <span style="color: red; font-size: 500;"><?= $error ?></span>
            <?php else : ?>
                Veuillez saisir vos informations de connexion...
            <?php endif ?>
        </h4>
        <div class="input-field">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="email@exemple.com...">
        </div>
        <div class="input-field">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Mot de passe...">
        </div>

        <input type="submit" value="Se connecter">
    </form>
</main>
<?php include('./partials/footer.php') ?>