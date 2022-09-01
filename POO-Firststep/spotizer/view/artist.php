<?php
require_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "Controler" . DIRECTORY_SEPARATOR . "session-start.php";


// Parametres du header
$pageTitle = "Artists";
// $customCssLinks = ['<link rel="stylesheet" href="artists.css">'];
?>

<!-- HEADER -->
<?php require __DIR__ . DIRECTORY_SEPARATOR . "partial" . DIRECTORY_SEPARATOR . "header.php"; ?>

<!-- BODY -->
<H1>Welcome to page ARTISTS</H1>

<table class="table table-dark table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Nationality</th>
            <th scope="col">Career beginning</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_SESSION['data']['artists'] as $key => $artist) : ?>
                <tr>
                    <td><?= $_SESSION['data']['artists'][$key]->getName() ?></td>
                    <td><?= $_SESSION['data']['artists'][$key]->getNationality() ?></td>
                    <td><?= date_format($_SESSION['data']['artists'][$key]->getbeginingDate(), "Y") ?></td>
                </tr>
            <?php endforeach ?>
    </tbody>
</table>

<!-- FOOTER -->
<?php require __DIR__ . DIRECTORY_SEPARATOR . "partial" . DIRECTORY_SEPARATOR . "footer.php"; ?>