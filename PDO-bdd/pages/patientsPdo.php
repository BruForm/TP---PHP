<?php
session_start();
if (isset($_SESSION['spy'])) {
    $_SESSION['spy']['patientsPdo']++;
}

$title = 'PHP : TP PDO';
$styleCSS = '../pages/patientsPdo.css';

?>

<!-- HEADER -->
<?php include '../partials/header.php' ?>

<!-- BODY -->

<div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <ul>
                    <li><a href="liste-patients.php">Consulter les patients</a></li>
                    <li><a href="liste-rdvs.php">Consulter les rendez-vous</a></li>
                    <li><a href="ajout-patient.php">Ajouter un patient</a></li>
                    <li><a href="ajout-rdv.php">Ajouter un rendez-vous</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

<!-- FOOTER -->
<?php include '../partials/footer.php' ?>