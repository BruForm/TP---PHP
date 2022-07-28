<?php $title = 'Demo PHP view Form'; ?>
<?php $styleCSS = 'form.css'; ?>

<!-- CODE  -->
<?php
var_dump($_POST);
$pseudo = '';
$age = '';
$password = '';
$phasmo = '';
$sc = '';
$color = '';
$date = '';
$email = '';
$sexe = '';
if (isset($_POST['submit'])) {

    if (isset($_POST['pseudo'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
    }

    if (isset($_POST['age'])) {
        $age = htmlspecialchars($_POST['age']);
    }

    if (isset($_POST['password'])) {
        $password = htmlspecialchars($_POST['password']);
    }

    if (isset($_POST['cbJeuPhasmo'])) {
        $phasmo = htmlspecialchars($_POST['cbJeuPhasmo']);
    }

    if (isset($_POST['cbJeuSC'])) {
        $sc = htmlspecialchars($_POST['cbJeuSC']);
    }

    if (isset($_POST['color'])) {
        $color = htmlspecialchars($_POST['color']);
        $colortxt = "#"
            . dechex(((hexdec(substr($color, 1, 2)) + 128) % 255))
            . dechex(((hexdec(substr($color, 3, 2)) + 128) % 255))
            . dechex(((hexdec(substr($color, 5, 2)) + 128) % 255));
    }

    if (isset($_POST['date'])) {
        $date = htmlspecialchars($_POST['date']);
    }

    if (isset($_POST['email'])) {
        $email = htmlspecialchars($_POST['email']);
    }

    if (isset($_POST['sexe'])) {
        $sexe = htmlspecialchars($_POST['sexe']);
    }
}
?>


<!-- HEADER -->
<?php include '../partials/header.php' ?>

<!-- BODY -->
<h3>Bonjour veuiilez saisir les informations : </h3>

<form action="form.php" method="POST">

    <div>
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo">
    </div>

    <div>
        <label for="age">Age</label>
        <input type="number" name="age" id="age">
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>

    <!-- <div>
        <label for="button">button</label>
        <input type="button" name="button" id="button">
    </div> -->

    <div>
        <label for="cbJeux">Phasmo</label>
        <input type="checkbox" name="cbJeuPhasmo" id="cbJeuxPhasmo" value="Phasmophobia">
        <label for="cbJeux">Star Citizen</label>
        <input type="checkbox" name="cbJeuSC" id="cbJeuxSC" value="Star Citizen">
    </div>

    <div>
        <label for="color">color</label>
        <input type="color" name="color" id="color">
    </div>

    <div>
        <label for="date">date</label>
        <input type="date" name="date" id="date">
    </div>

    <div>
        <label for="email">email</label>
        <input type="email" name="email" id="email">
    </div>

    <div>
        <label for="sexeM">Homme</label>
        <input type="radio" name="sexe" id="sexeM" value="M">
        <label for="sexeF">Femme</label>
        <input type="radio" name="sexe" id="sexeF" value="F">
    </div>

    <div>
        <label for="reset">reset</label>
        <input type="reset" name="reset" id="reset">
    </div>

    <div>
        <label for="search">search</label>
        <input type="search" name="search" id="search">
    </div>

    <div>
        <label for="tel">tel</label>
        <input type="tel" name="tel" id="tel">
    </div>

    <div>
        <label for="time">time</label>
        <input type="time" name="time" id="time">
    </div>

    <div>
        <label for="url">url</label>
        <input type="url" name="url" id="url    ">
    </div>

    <div>
        <label for="week">week</label>
        <input type="week" name="week" id="week">
    </div>

    <input type="submit" value="submit" name="submit">

</form>

<hr>
<div>
    <p>Votre pseudo est : <?= $pseudo ?> </p>
    <p>Votre age est : <?= $age ?> </p>
    <p>Votre password est : <?= $password ?> </p>
    <p>Vous jouez à :
        <?php if ($phasmo != '') : ?><?= $phasmo ?><?php endif ?>
        <?php if ($phasmo != '' && $sc != '') : ?> et <?php endif ?>
        <?php if ($sc != '') : ?><?= $sc ?><?php endif ?>
    </p>
    <p>Votre couleur est : <span style="background-color:<?= $color ?>; color:<?= $colortxt ?>"><?= $color ?></span> </p>
    <p>La date choisie est : <?= $date ?> </p>
    <p>Votre e-mail est : <?= $email ?> </p>
    <p>Votre sexe est : <?= $sexe ?></p>

</div>
<hr>
<!-- FOOTER -->
<?php include '../partials/footer.php' ?>