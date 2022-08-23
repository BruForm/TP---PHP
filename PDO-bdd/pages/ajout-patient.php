<?php
session_start();
if (isset($_SESSION['spy'])) {
    $_SESSION['spy']['ajoutPatient']++;
}

require_once '../data/dataBase.php';

$title = 'PHP : TP PDO';
$styleCSS = '../pages/ajout-patient.css';

if ((isset($_POST['lastName'], $_POST['firstName'], $_POST['birthDate'], $_POST['phone'], $_POST['email']))
    && !empty($_POST['lastName'])
    && !empty($_POST['firstName'])
    && !empty($_POST['birthDate'])
    && !empty($_POST['phone'])
    && !empty($_POST['email'])
) {
    $createNb = insertPatient(
        htmlentities($_POST['lastName']),
        htmlentities($_POST['firstName']),
        htmlentities($_POST['birthDate']),
        htmlentities($_POST['phone']),
        htmlentities($_POST['email'])
    );
}

function insertPatient($lastName, $firstName, $birthDate, $phone, $email): int
{
    try {
        $createNb = 0;
        $db = connectDB('localhost', 'hospitale2n', 'root', '');
        $createNb = queryInsertPatient($db, $lastName, $firstName, $birthDate, $phone, $email);
        $db = null;
        return $createNb;
    } catch (PDOException $e) {
        echo "<PRE>";
        var_dump($e);
        echo "</PRE>";
    }
}

?>

<!-- HEADER -->
<?php include '../partials/header.php' ?>

<!-- BODY -->

<div class="container">
    <form class="createPatient" action="" method="POST">
        <div class="oneRow">
            <label for="lastName">Nom :</label>
            <input type="text" name="lastName" id="lastName" placeholder="Entrez votre nom...">
        </div>
        <div class="oneRow">
            <label for="firstName">Prénom :</label>
            <input type="text" name="firstName" id="firstName" placeholder="Entrez votre prénom...">
        </div>
        <div class="oneRow">
            <label for="birthDate">Date de naissance :</label>
            <input type="date" name="birthDate" id="birthDate">
        </div>
        <div class="oneRow">
            <label for="phone">Téléphone :</label>
            <input type="tel" name="phone" id="phone" placeholder="Entrez votre numéro de téléphone...">
        </div>
        <div class="oneRow">
            <label for="email">E-mail :</label>
            <input type="email" name="email" id="email" placeholder="Entrez votre e-mail...">
        </div>

        <button type="submit">Enregistrer</button>

        <?php if (isset($createNb) && ($createNb)) : ?>
            <div class="alertCreate">
                <?= $createNb ?> enregistrement a bien été créé !
            </div>
        <?php endif ?>

    </form>
    
    <a href="liste-patients.php"><button>Retour liste</button></a>

</div>

<!-- FOOTER -->
<?php include '../partials/footer.php' ?>