<?php
session_start();
if (isset($_SESSION['spy'])) {
    $_SESSION['spy']['listePatients']++;
}

require_once '../data/dataBase.php';

$title = 'PHP : TP PDO';
$styleCSS = '../pages/liste-patients.css';

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

?>

<!-- HEADER -->
<?php include '../partials/header.php' ?>

<!-- BODY -->

<div class="container">
    <h2>Liste des patients</h2>
    <table>
        <thead>
            <tr>
                <?php foreach ($patients[0] as $key => $value) : ?>
                    <th><?= $key ?> </th>
                <?php endforeach ?>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($patients as $patient) : ?>
                <tr>
                    <?php foreach ($patient as $key => $value) : ?>
                        <td><a href="profile-patient.php?id=<?=$patient['id']?>"><?= $value ?></a></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <a href="ajout-patient.php"><button>Créer patient</button></a>

</div>

<!-- FOOTER -->
<?php include '../partials/footer.php' ?>