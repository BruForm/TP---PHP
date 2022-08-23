<?php
session_start();
if (isset($_SESSION['spy'])) {
    $_SESSION['spy']['profilePatient']++;
}

require_once '../data/dataBase.php';

$title = 'PHP : TP PDO';
$styleCSS = '../pages/profile-patient.css';

// Get patient informations
if ((isset($_GET['id']))
    && !empty($_GET['id'])
) {
    $id = htmlentities($_GET['id']);
    $patient = selectPatientId($id)[0];
}

// Update patient informations
if (isset($_GET['id'], $_POST['lastName'], $_POST['firstName'], $_POST['birthDate'], $_POST['phone'], $_POST['email'])
    && !empty($_GET['id'])
    && !empty($_POST['lastName'])
    && !empty($_POST['firstName'])
    && !empty($_POST['birthDate'])
    && !empty($_POST['phone'])
    && !empty($_POST['email'])
) {
    $createNb = updatePatientId(
        htmlentities($_GET['id']),
        htmlentities($_POST['lastName']),
        htmlentities($_POST['firstName']),
        htmlentities($_POST['birthDate']),
        htmlentities($_POST['phone']),
        htmlentities($_POST['email'])
    );

    $patient = selectPatientId(htmlentities($_GET['id']))[0];
}

function selectPatientId(int $id): array
{
    try {
        $db = connectDB('localhost', 'hospitale2n', 'root', '');
        $querySelect = "
        SELECT * FROM patients WHERE id = $id ORDER BY lastname, firstname
        ";
        $result = querySelect($db, $querySelect);
        $db = null;
        return $result;
    } catch (PDOException $e) {
        echo "<PRE>";
        var_dump($e);
        echo "</PRE>";
    }
}

function updatePatientId(int $id, string $lastName, string $firstName, string $birthDate, string $phone, string $email): int
{
    try {
        $db = connectDB('localhost', 'hospitale2n', 'root', '');
        $queryUpdate = "
            UPDATE patients 
            SET
                lastname = '$lastName',
                firstname = '$firstName',
                birthDate = '$birthDate',
                phone = '$phone',
                mail = '$email'
            WHERE id = $id 
        ";

        $result = queryUpdate($db, $queryUpdate);
        $db = null;
        return $result;
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
    <h2>Profile du patient</h2>

    <form action="" method="POST">
        <div class="oneRow">
            <label for="lastName">Nom :</label>
            <input type="text" name="lastName" id="lastName" value="<?= $patient['lastname'] ?>">
        </div>
        <div class="oneRow">
            <label for="firstName">Prénom :</label>
            <input type="text" name="firstName" id="firstName" value="<?= $patient['firstname'] ?>">
        </div>
        <div class="oneRow">
            <label for="birthDate">Date de naissance :</label>
            <input type="text" name="birthDate" id="birthDate" value="<?= $patient['birthdate'] ?>">
        </div>
        <div class="oneRow">
            <label for="phone">Téléphone :</label>
            <input type="tel" name="phone" id="phone" value="<?= $patient['phone'] ?>">
        </div>
        <div class="oneRow">
            <label for="email">E-mail :</label>
            <input type="email" name="email" id="email" value="<?= $patient['mail'] ?>">
        </div>
        
        <button type="submit">Enregistrer modifications</button>
        
        <?php if (isset($createNb) && ($createNb)) : ?>
            <div class="alertUpdate">
                <?= $createNb ?> Infos patient mises à jours !
            </div>
        <?php endif ?>
    </form>
    <a href="liste-patients.php"><button>Retour liste</button></a>

</div>

<!-- FOOTER -->
<?php include '../partials/footer.php' ?>