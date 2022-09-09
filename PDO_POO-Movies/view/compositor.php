<?php
//require_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "Controler" . DIRECTORY_SEPARATOR . "session-start.php";

require_once "../vendor/autoload.php";

use App\Repository\Compositor_repo;

$compositors = (new Compositor_repo())->findCompositors();

//echo "<Pre>";
//var_dump($compositors);
//echo "</Pre>";

// Parametres du header
$pageTitle = "Compositors";
$customCssLinks = ['<link rel="stylesheet" href="../style/compositor.css">'];
?>

    <!-- HEADER -->
<?php require __DIR__ . DIRECTORY_SEPARATOR . "partial" . DIRECTORY_SEPARATOR . "header.php"; ?>

    <!-- BODY -->
    <H1 class="text-center">Welcome to page Compositors</H1>

    <table class="table table-dark table-striped table-hover">
        <thead>
        <tr>
            <th class="col-md-3">Name</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($compositors as $key => $compositor) : ?>
            <tr>
                <td><?= $compositor->getCompositorName() ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

    <!-- FOOTER -->
<?php require __DIR__ . DIRECTORY_SEPARATOR . "partial" . DIRECTORY_SEPARATOR . "footer.php"; ?>