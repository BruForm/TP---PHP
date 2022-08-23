<?php
session_start();
if (isset($_SESSION['spy'])) {
    $_SESSION['spy']['listeRdvs']++;
}

require_once '../data/dataBase.php';

$title = 'PHP : TP PDO';
$styleCSS = '../pages/liste-rdvs.css';

$appointments = selectRdv();

// DELETE appointment
if (
    isset($_POST['rdvId'])
    && !empty($_POST['rdvId'])
) {
    $deleteNb = deleteAppointmentId(
        htmlentities($_POST['rdvId'])
    );

    $appointments = selectRdv();
}


function selectRdv(): array
{
    try {
        $db = connectDB('localhost', 'hospitale2n', 'root', '');
        $querySelect = "
        SELECT ap.id, ap.dateHour as Date, pa.lastname 'Nom', pa.firstname 'Prénom'
        FROM appointments ap, patients pa 
        Where pa.id = ap.idPatients
        ORDER BY ap.dateHour desc
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

function deleteAppointmentId(int $id)
{
    try {
        $db = connectDB('localhost', 'hospitale2n', 'root', '');
        $queryDelete = "
            DELETE
            FROM appointments
            WHERE 1=1
            AND id = $id
        ";
        $result = queryDelete($db, $queryDelete);
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
    <h2>Liste des rendez-vous</h2>
    <table>
        <thead>
            <tr>
                <?php foreach ($appointments[0] as $key => $value) : ?>
                    <?php if ($key != 'id') : ?>
                        <th><?= $key ?> </th>
                    <?php endif ?>
                <?php endforeach ?>
                <th> </th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($appointments as $appointment) : ?>
                <tr>
                    <td>
                        <a href="rendez-vous.php?id=<?= $appointment['id'] ?>">
                            Le <?= substr($appointment['Date'], 0, 10) . ' à ' . substr($appointment['Date'], 11, 8) ?>
                        </a>
                    </td>
                    <td>
                        <a href="rendez-vous.php?id=<?= $appointment['id'] ?>">
                            <?= $appointment['Nom'] ?>
                        </a>
                    </td>
                    <td>
                        <a href="rendez-vous.php?id=<?= $appointment['id'] ?>">
                            <?= $appointment['Prénom'] ?>
                        </a>
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="rdvId" id="rdvId" value="<?= $appointment['id'] ?>">
                            <button type="submit" class="delBtn">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <?php if (isset($deleteNb) && ($deleteNb)) : ?>
        <div class="alertDelete">
            <?= $deleteNb ?> Rendez-vous supprimé !
        </div>
    <?php endif ?>

    <a href="ajout-rdv.php"><button>Créer rendez-vous</button></a>

</div>

<!-- FOOTER -->
<?php include '../partials/footer.php' ?>