<?php
session_start();
if (isset($_SESSION['spy'])) {
    $_SESSION['spy']['ajoutRdv']++;
}

require_once '../data/dataBase.php';

$title = 'PHP : TP PDO';
$styleCSS = '../pages/ajout-rdv.css';

// Selection des patients
$patients = selectPatient();
function selectPatient(): array
{
    try {
        $db = connectDB('localhost', 'hospitale2n', 'root', '');
        $querySelect = "
        SELECT * FROM patients ORDER BY lastname, firstname
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

// Creation d'un rdv
if ((isset($_POST['idPatient'], $_POST['firstName'], $_POST['date'], $_POST['hour']))
    && !empty($_POST['idPatient'])
    && !empty($_POST['firstName'])
    && !empty($_POST['date'])
    && !empty($_POST['hour'])
) {
    $createNb = insertAppointments(
        htmlentities($_POST['idPatient']),
        htmlentities($_POST['firstName']),
        htmlentities($_POST['date']),
        htmlentities($_POST['hour'])
    );
}

function insertAppointments($idPatient, $date, $hour): int
{
    try {
        $createNb = 0;
        $db = connectDB('localhost', 'hospitale2n', 'root', '');
        $createNb = queryInsertAppointments($db, $idPatient, $date, $hour);
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
    <form class="createRdv" action="" method="POST">
        <div class="oneRow">
            <label for="lastName">Nom :</label>
            <!-- <input type="text" name="lastName" id="lastName" placeholder="Entrez votre nom..."> -->
            <select name="idPatient" id="idPatient" class="idPatient">
                <?php foreach ($patients as $key => $patient) : ?>
                    <option value="<?= $patient['id'] ?>"><?= $patient['lastname'] . ' ' . $patient['firstname'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <!-- <div class="oneRow">
            <label for="firstName">Prénom :</label>
            <input type="text" name="firstName" id="firstName" placeholder="Entrez votre prénom...">
        </div> -->
        <div class="oneRow">
            <label for="date">Date :</label>
            <input type="date" name="date" id="date">
        </div>
        <div class="oneRow">
            <label for="time">Heure :</label>
            <input type="time" name="hour" id="hour">
        </div>

        <button type="submit">Enregistrer</button>

        <?php if (isset($createNb) && ($createNb)) : ?>
            <div class="alertCreate">
                <?= $createNb ?> Rendez-vous a bien été créé !
            </div>
        <?php endif ?>

    </form>

    <a href="liste-rdvs.php"><button>Retour liste</button></a>

</div>

<!-- FOOTER -->
<?php include '../partials/footer.php' ?>