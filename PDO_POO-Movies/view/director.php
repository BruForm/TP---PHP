<?php
//require_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "Controler" . DIRECTORY_SEPARATOR . "session-start.php";

require_once "../vendor/autoload.php";

use App\Repository\Director_repo;

$directors = (new Director_repo())->findDirectors();

//echo "<Pre>";
//var_dump($directors);
//echo "</Pre>";

// Parametres du header
$pageTitle = "Directors";
$customCssLinks = ['<link rel="stylesheet" href="../style/director.css">'];
?>

<!-- HEADER -->
<?php require __DIR__ . DIRECTORY_SEPARATOR . "partial" . DIRECTORY_SEPARATOR . "header.php"; ?>

<!-- BODY -->
<H1 class="text-center">Welcome to page directors</H1>

<table class="table table-dark table-striped table-hover">
    <thead>
    <tr>
        <th class="col-md-3">Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($directors as $key => $director) : ?>
        <tr>
            <td><?= $director->getDirectorName() ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

<!-- FOOTER -->
<?php require __DIR__ . DIRECTORY_SEPARATOR . "partial" . DIRECTORY_SEPARATOR . "footer.php"; ?>
