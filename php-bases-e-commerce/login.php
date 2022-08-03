<?php
session_start();

// include './data/users.php';
require_once './functions/login.php';

$page = 'login';
$pageTitle = "Connexion";
$customCssLinks = ['<link rel="stylesheet" href="/assets/login.css">'];

$error = null;
if ((isset($_GET['email']) && !empty($_GET['email']))
    && (isset($_GET['password']) && !empty($_GET['password']))
) {
    $UserLoged = checkUserLogin($_GET['email'], $_GET['password']);                 // utilisation function
    if ($UserLoged['loginOK']) {                                                    // utilisation function
        $_SESSION['user'] = $UserLoged['userLoged'];                                // utilisation function
        header('location: ./index.php');                                            // utilisation function
    } else $error = "Les informations saisies sont incorrectes !";                  // utilisation function

    // foreach ($users as $user) {                                                  // utilisation function
    //     if ($user['email'] === $_GET['email']) {                                 // utilisation function
    //         if (password_verify($_GET['password'], $user['password'])) {         // utilisation function
    //             $_SESSION['user'] = $user;                                       // utilisation function
    //             header('location: ./index.php');                                 // utilisation function
    //             break 1;                                                         // utilisation function
    //         } else $error = "Les informations saisies sont incorrectes !";       // utilisation function
    //     }                                                                        // utilisation function
    // }                                                                            // utilisation function
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