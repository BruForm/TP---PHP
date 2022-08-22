<?php
session_start();
if (isset($_SESSION['spy'])) {
    $_SESSION['spy']['ajoutPatient']++;
}

$title = 'PHP : TP PDO';
$styleCSS = '../pages/ajout-patient.css';

if ((isset($_POST['lastName'], $_POST['firstName'], $_POST['birthDate'], $_POST['phone'], $_POST['email'])) 
&& !empty($_POST['lastName'])
&& !empty($_POST['firstName'])
&& !empty($_POST['birthDate'])
&& !empty($_POST['phone'])
&& !empty($_POST['email']))
{

    // echo "<PRE>";
    // var_dump($_POST);
    // echo "</PRE>";
    // die();

    $lastName = htmlentities($_POST['lastName']);
    $firstName = htmlentities($_POST['firstName']);
    $birthDate = htmlentities($_POST['birthDate']);
    $phone = htmlentities($_POST['phone']);
    $email = htmlentities($_POST['email']);

    // PDO - DEBUT
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'hospitale2n';

    try {
        $db = new PDO("mysql:host=$server;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $queryInsert = "
            INSERT INTO patients (lastname, firstname, birthdate, phone, mail)
            VALUES (:lastname, :firstname, :birthdate, :phone, :email)
        ";
        $query = $db->prepare($queryInsert);

        $query->bindParam(':lastname', $lastName, PDO::PARAM_STR);
        $query->bindParam(':firstname', $firstName, PDO::PARAM_STR);
        $query->bindParam(':birthdate', $birthDate);
        $query->bindParam(':phone', $phone, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);

        $createNb = 0;
        $query->execute();

        // echo "<PRE>";
        // var_dump($query->rowCount());
        // echo "</PRE>";
        $createNb = $query->rowCount();

        $db = null;
    } catch (PDOException $e) {
        echo "<PRE>";
        var_dump($e);
        echo "</PRE>";
    }
    // PDO - FIN
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

</div>

<!-- FOOTER -->
<?php include '../partials/footer.php' ?>