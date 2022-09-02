<?php
require_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "Controler" . DIRECTORY_SEPARATOR . "session-start.php";


// Parametres du header
$pageTitle = "Albums";
// $customCssLinks = ['<link rel="stylesheet" href="album.css">'];
?>


<!-- HEADER -->
<?php require __DIR__ . DIRECTORY_SEPARATOR . "partial" . DIRECTORY_SEPARATOR . "header.php"; ?>

<!-- BODY -->
<H1 class="text-center">Welcome to page ALBUMS</H1>

<table class="table table-dark table-striped table-hover">
    <thead>
        <tr>
            <th class="col-md-2">Title</th>
            <th class="col-md-2">Release Date</th>
            <th class="col-md-1">Duration</th>
            <th class="col-md-1">Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_SESSION['data']['albums'] as $key => $album) : ?>
            <tr>
                <td><?= $album->getTitle() ?>
                    <small> (<a href="<?= ($_GET['action'] === "view_songs" && $_GET['album'] === $album->getTitle())
                                            ? "./album.php"
                                            : "./album.php?action=view_songs&album=" . $album->getTitle(); ?>" class="text-light">Songs</a>)</small>
                </td>
                <td><?= $album->getReleaseDateFormated() ?></td>
                <td><?= $album->getDuration(true) ?></td>
                <td><?= $album->getPriceByCurrency() ?></td>
            </tr>
            <?php if ($_GET['action'] === "view_songs" && $_GET['album'] === $album->getTitle()) : ?>
                <thead>
                    <tr class="table-primary text-dark">
                        <th>Songs<small> (<a href="./album.php" class="text-dark">Close</a>)</small></th>
                        <th>Title</th>
                        <th>Duration</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <?php $i = 0;
                foreach ($_SESSION['data']['albums'][$key]->getSongs() as $key => $song) : ?>
                    <tr class="table-primary text-dark">
                        <td><?= ++$i ?></td>
                        <td><?= $song->getTitle() ?></td>
                        <td><?= $song->getDurationFormated() ?></td>
                        <td><?= $song->getPriceByCurrency() ?></td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        <?php endforeach ?>
    </tbody>
</table>

<!-- FOOTER -->
<?php require __DIR__ . DIRECTORY_SEPARATOR . "partial" . DIRECTORY_SEPARATOR . "footer.php"; ?>