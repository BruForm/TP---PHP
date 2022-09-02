<?php

$link = $_SERVER["REQUEST_URI"];
$minLink = $link;
if (strpos($link, ".php", 0)) {
    $minLink = substr($link, 0, strpos($link, ".php", 0));
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>

    <link rel="stylesheet" href="../../style.css">
    <?php
    if (isset($customCssLinks) && !empty($customCssLinks)) {
        foreach ($customCssLinks as $customCssLink) {
            echo $customCssLink;
        }
    }
    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">SpotiZer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- <li class="nav-item"> -->
                    <!-- <a class="nav-link active" aria-current="page" href="#">Home</a> -->
                    <!-- </li> -->
                    <li class="nav-item">
                        <a class="nav-link <?= ($minLink === "/view/artist") ? "active" : ""; ?>" href="../view/artist.php">Artists</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($minLink === "/view/album") ? "active" : ""; ?>" href="../view/album.php">Albums</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($minLink === "/view/song") ? "active" : ""; ?>" href="../view/song.php">Songs</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">