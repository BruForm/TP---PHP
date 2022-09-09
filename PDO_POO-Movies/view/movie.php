<?php
//require_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "Controler" . DIRECTORY_SEPARATOR . "session-start.php";

require_once "../vendor/autoload.php";

use App\Repository\Movie_repo;

$movies = (new Movie_repo())->findMovies();

//echo "<Pre>";
//var_dump($movies);
//echo "</Pre>";

// Parametres du header
$pageTitle = "Movies";
$customCssLinks = ['<link rel="stylesheet" href="../style/movie.css">'];
?>
    <!-- HEADER -->
<?php require __DIR__ . DIRECTORY_SEPARATOR . "partial" . DIRECTORY_SEPARATOR . "header.php"; ?>

    <!-- BODY -->
    <h1 class="text-center">Welcome to page Movies</h1>

    <table class="table table-dark table-striped table-hover">
        <thead>
        <tr>
            <th class="col-md-1"></th>
            <th class="col-md-3">Title</th>
            <th class="col-md-1">Duration</th>
            <th class="col-md-1">Genre</th>
            <th class="col-md-1">Released at</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($movies as $key => $movie) : ?>
            <tr>
                <td><img src="<?= $movie->getCover() ?>"></td>
                <td><a href="movieInformations.php?action=read&movieId=<?= $movie->getId() ?>" class="text-light">
                        <?= $movie->getTitle() ?></a></td>
                <td><?= $movie->getDurationFormatted() ?></td>
                <td><?= $movie->getGenre() ?></td>
                <td><?= $movie->getReleasedAtFormatted() ?></td>
            </tr>1
        <?php endforeach ?>
        </tbody>
    </table>

    <!-- FOOTER -->
<?php require __DIR__ . DIRECTORY_SEPARATOR . "partial" . DIRECTORY_SEPARATOR . "footer.php"; ?>