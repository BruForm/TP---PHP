<?php
//require_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "Controler" . DIRECTORY_SEPARATOR . "session-start.php";

require_once "../vendor/autoload.php";

use App\Repository\Actor_repo;

$actors = (new Actor_repo())->findActors();

//echo "<Pre>";
//var_dump($actors);
//echo "</Pre>";

// Parametres du header
$pageTitle = "Actors";
$customCssLinks = ['<link rel="stylesheet" href="../style/actor.css">'];
?>

    <!-- HEADER -->
<?php require __DIR__ . DIRECTORY_SEPARATOR . "partial" . DIRECTORY_SEPARATOR . "header.php"; ?>

    <!-- BODY -->
    <H1 class="text-center">Welcome to page Actors</H1>

    <table class="table table-dark table-striped table-hover">
        <thead>
        <tr>
            <th class="col-md-3">Name</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($actors as $key => $actor) : ?>
            <tr>
                <td><?= $actor->getName() ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

    <!-- FOOTER -->
<?php require __DIR__ . DIRECTORY_SEPARATOR . "partial" . DIRECTORY_SEPARATOR . "footer.php"; ?>