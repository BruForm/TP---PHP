<?php
require_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "Controler" . DIRECTORY_SEPARATOR . "session-start.php";


// Parametres du header
$pageTitle = "Artists";
// $customCssLinks = ['<link rel="stylesheet" href="artists.css">'];
?>

<!-- HEADER -->
<?php require __DIR__ . DIRECTORY_SEPARATOR . "partial" . DIRECTORY_SEPARATOR . "header.php"; ?>

<!-- BODY -->
<H1 class="text-center">Welcome to page ARTISTS</H1>

<table class="table table-dark table-striped table-hover">
    <thead>
        <tr>
            <th class="col-md-2">Name</th>
            <th class="col-md-1">Nationality</th>
            <th class="col-md-1">Career beginning</th>
            <th class="col-md-2">Style(s)</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_SESSION['data']['artists'] as $key => $artist) : ?>
            <tr>
                <td><?= $artist->getName() ?></td>
                <td><?= $artist->getNationality() ?></td>
                <td><?= $artist->getBeginingDateFormated("Y") ?></td>
                <td>
                    <?php foreach ($artist->getStyles() as $ind => $style) : ?>
                        <?= ($ind === array_search(end($artist->getStyles()), $artist->getStyles())) ? $style->getName() : $style->getName() . " / "; ?>
                    <?php endforeach ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- FOOTER -->
<?php require __DIR__ . DIRECTORY_SEPARATOR . "partial" . DIRECTORY_SEPARATOR . "footer.php"; ?>

<!-- <pre><?= var_dump($artist->getStyles()) ?></pre> -->