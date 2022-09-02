<?php

require_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "Controler" . DIRECTORY_SEPARATOR . "session-start.php";


// Parametres du header
$pageTitle = "Songs";
// $customCssLinks = ['<link rel="stylesheet" href="song.css">'];
?>

<!-- HEADER -->
<?php require __DIR__ . DIRECTORY_SEPARATOR . "partial" . DIRECTORY_SEPARATOR . "header.php"; ?>

<!-- BODY -->
<h1 class="text-center">Welcome to page SONGS</h1>

<table class="table table-dark table-striped table-hover">
    <thead>
        <tr>
            <th class="col-md-2">Title</th>
            <th class="col-md-2">Artist(s)</th>
            <th class="col-md-1">Duration</th>
            <th class="col-md-1">Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_SESSION['data']['songs'] as $key => $song) : ?>
            <tr>
                <td><?= $song->getTitle() ?></td>
                <td>
                    <?php foreach ($song->getArtists() as $ind => $artist) : ?>
                        <?= ($ind === array_search(end($song->getArtists()), $song->getArtists())) ? $artist->getName() : $artist->getName() . " / "; ?>
                    <?php endforeach ?>
                </td>
                <td><?= $song->getDurationFormated() ?></td>
                <td><?= $song->getPriceByCurrency("€") ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- FOOTER -->
<?php require __DIR__ . DIRECTORY_SEPARATOR . "partial" . DIRECTORY_SEPARATOR . "footer.php"; ?>