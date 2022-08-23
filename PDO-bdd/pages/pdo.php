<?php
session_start();
if (isset($_SESSION['spy'])) {
    $_SESSION['spy']['tpPdo']++;
}

$title = 'PHP : TP PDO';
$styleCSS = '../pages/tpPdo.css';

// PDO - DEBUT
$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'colyseum';

try {
    $db = new PDO("mysql:host=$server;dbname=$dbname", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $reqSelect = "
                    SELECT *
                    FROM clients
                    WHERE 1=1
                    AND card = 1
                    ORDER BY lastName, firstName
                    LIMIT 20;
                ";
    $sth = $db->prepare($reqSelect);
    $sth->execute();
    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

    $reqSelect = "
                    SELECT *
                    FROM showtypes
                    ORDER BY type
                ";
    $sth = $db->prepare($reqSelect);
    $sth->execute();
    $resExo2 = $sth->fetchAll(PDO::FETCH_ASSOC);

    $reqSelect = "
        SELECT concat('nom : ', lastName) as Name, concat('Prénom : ', firstName) as 'First Name'
        FROM clients
        WHERE 1=1
        AND lastName LIKE 'M%'
        ORDER BY lastName, firstName
    ";
    $sth = $db->prepare($reqSelect);
    $sth->execute();
    $resExo5 = $sth->fetchAll(PDO::FETCH_ASSOC);

    $reqSelect = "
        SELECT concat(title, ' par ', performer, ', le ', date, ' à ', startTime ) as spectacle
        FROM shows
        WHERE 1=1
        ORDER BY date, startTime
    ";
    $sth = $db->prepare($reqSelect);
    $sth->execute();
    $resExo6 = $sth->fetchAll(PDO::FETCH_ASSOC);

    $reqSelect = "
                    SELECT lastName, firstName, birthDate, card, cardNumber
                    FROM clients
                    WHERE 1=1
                    ORDER BY lastName, firstName
                ";
    $sth = $db->prepare($reqSelect);
    $sth->execute();
    $resExo7 = $sth->fetchAll(PDO::FETCH_ASSOC);

    $db = null;

    // echo "<PRE>";
    // var_dump($resultat);
    // echo "</PRE>";
} catch (PDOException $e) {
    echo "<PRE>";
    var_dump($e);
    echo "</PRE>";
}

// PDO - FIN

?>

<!-- HEADER -->
<?php include '../partials/header.php' ?>

<!-- BODY -->
<div class="container">
    <h1>TP PDO - Partie 1 : Lire des données</h1>

    <h2>Exercice 1 3 4</h2>
    <table>
        <thead>
            <tr>
                <?php foreach ($resultat[0] as $key => $value) : ?>
                    <th><?= $key ?> </th>
                <?php endforeach ?>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($resultat as $client) : ?>
                <tr>
                    <?php foreach ($client as $key => $value) : ?>
                        <td><?= $value ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <hr>
    <h2>Exercice 2</h2>
    <table>
        <thead>
            <tr>
                <?php foreach ($resExo2[0] as $key => $value) : ?>
                    <th><?= $key ?> </th>
                <?php endforeach ?>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($resExo2 as $showtype) : ?>
                <tr>
                    <?php foreach ($showtype as $key => $value) : ?>
                        <td><?= $value ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <hr>
    <h2>Exercice 5</h2>
    <table>
        <thead>
            <tr>
                <?php foreach ($resExo5[0] as $key => $value) : ?>
                    <th><?= $key ?> </th>
                <?php endforeach ?>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($resExo5 as $client) : ?>
                <tr>
                    <?php foreach ($client as $key => $value) : ?>
                        <td><?= $value ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <hr>
    <h2>Exercice 6</h2>
    <ul>
        <?php foreach ($resExo6 as $spectacle) : ?>
            <li><?= $spectacle['spectacle'] ?></li>
            <!-- <?php foreach ($spectacle as $key => $value) : ?> -->
            <!-- <li><?= $value ?></li> -->
            <!-- <?php endforeach ?> -->
        <?php endforeach ?>
    </ul>

    <hr>
    <h2>Exercice 7</h2>
    <table class="exo7">
        <tbody>
            <?php foreach ($resExo7 as $client) : ?>
                <tr>
                    <td>
                        <li>Nom : <?= $client['lastName'] ?></li>
                        <li>Prénom : <?= $client['firstName'] ?></li>
                        <li>Date de naissance : <?= $client['birthDate'] ?></li>
                        <li>Carte de fidélité : <?= $client['card']?"Oui":"Non" ?></li>
                        <?php if($client['card']) : ?>
                            <li>Numéro de carte : <?= $client['cardNumber'] ?></li>
                        <?php endif ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>
<!-- FOOTER -->
<?php include '../partials/footer.php' ?>