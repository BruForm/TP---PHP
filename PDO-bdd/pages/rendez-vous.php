<?php
session_start();
if (isset($_SESSION['spy'])) {
    $_SESSION['spy']['rdv']++;
}

require_once '../data/dataBase.php';

$title = 'PHP : TP PDO';
$styleCSS = '../pages/rendez-vous.css';

// Get appointments informations
if ((isset($_GET['id']))
    && !empty($_GET['id'])
) {
    $id = htmlentities($_GET['id']);
    $rdv = selectAppointmentId($id)[0];
}

// Update rdv informations
if (
    isset($_POST['rdvId'], $_POST['date'], $_POST['hour'])
    && !empty($_POST['rdvId'])
    && !empty($_POST['date'])
    && !empty($_POST['hour'])
) {
    $createNb = updateAppointmentId(
        htmlentities($_POST['rdvId']),
        htmlentities($_POST['date']),
        htmlentities($_POST['hour'])
    );

    $rdv = selectAppointmentId(htmlentities($_POST['rdvId']))[0];
}

function selectAppointmentId(int $id): array
{
    try {
        $db = connectDB('localhost', 'hospitale2n', 'root', '');
        $querySelect = "
            SELECT 
                ap.id as rdvId,
                substring(ap.dateHour, 1, 10) as date, 
                substring(ap.dateHour, 12, 8) as hour, 
                pa.lastname, 
                pa.firstname
            FROM appointments ap, patients pa
            WHERE 1=1
            AND ap.id = $id
            AND pa.id = ap.idPatients
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

function updateAppointmentId(int $id, string $date, string $hour): int
{
    try {
        $db = connectDB('localhost', 'hospitale2n', 'root', '');
        $dateHour = $date . ' ' . $hour;
        $queryUpdate = "
            UPDATE appointments
            SET
                dateHour = '$dateHour'
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
    <h2>Rendez-vous</h2>

    <form action="" method="POST">
        <div class="oneRow">
            <label for="date">Date :</label>
            <input type="date" name="date" id="date" value="<?= $rdv['date'] ?>">
        </div>
        <div class="oneRow">
            <label for="time">Heure :</label>
            <input type="time" name="hour" id="hour" value="<?= $rdv['hour'] ?>">
        </div>
        <div class="oneRow">
            <label for="lastName">Nom :</label>
            <input type="text" name="lastName" id="lastName" value="<?= $rdv['lastname'] ?>" disabled>
        </div>
        <div class="oneRow">
            <label for="firstName">Prénom :</label>
            <input type="text" name="firstName" id="firstName" value="<?= $rdv['firstname'] ?>" disabled>
        </div>
        <input type="hidden" name="rdvId" id="rdvId" value="<?= $rdv['rdvId'] ?>">

        <button type="submit">Enregistrer modifications</button>

        <?php if (isset($createNb) && ($createNb)) : ?>
            <div class="alertUpdate">
                <?= $createNb ?> Rendez-vous modifié !
            </div>
        <?php endif ?>
    </form>
    <a href="liste-rdvs.php"><button>Retour liste</button></a>

</div>

<!-- FOOTER -->
<?php include '../partials/footer.php' ?>