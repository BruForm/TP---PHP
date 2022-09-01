<?php
require_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "Controler" . DIRECTORY_SEPARATOR . "session-start.php";


// Parametres du header
$pageTitle = "Songs";
// $customCssLinks = ['<link rel="stylesheet" href="song.css">'];
?>

<!-- HEADER -->
<?php require __DIR__ . DIRECTORY_SEPARATOR . "partial" . DIRECTORY_SEPARATOR . "header.php"; ?>

<!-- BODY -->
<H1>Welcome to page SONGS</H1>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Duration</th>
            <th scope="col">Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_SESSION['data']['songs'] as $key => $song) : ?>
            <tr>
                <td><?= $_SESSION['data']['songs'][$key]->getTitle() ?></td>
                <td><?= ($_SESSION['data']['songs'][$key]->getDuration() >= 3600)
                        ? ($formated_duration = date("H:i:s", $_SESSION['data']['songs'][$key]->getDuration()))
                        : ($formated_duration = date("i:s", $_SESSION['data']['songs'][$key]->getDuration())); ?>
                </td>
                <td><?= $_SESSION['data']['songs'][$key]->getPrice() ?> €</td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- FOOTER -->
<?php require __DIR__ . DIRECTORY_SEPARATOR . "partial" . DIRECTORY_SEPARATOR . "footer.php"; ?>