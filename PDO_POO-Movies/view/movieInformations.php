<?php
//require_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "Controler" . DIRECTORY_SEPARATOR . "session-start.php";

require_once "../vendor/autoload.php";

use App\Repository\Movie_repo;
use App\Repository\Actor_repo;

$movie = null;
$actors = null;
if (isset($_GET['movieId'])) {
    $id = htmlentities($_GET['movieId']);
    $movieTemp = (new Movie_repo())->findMovieJoin($id);
    $movie = $movieTemp[0];

    $actors = (new Actor_repo())->findMovieActors($id);
}

//echo "<Pre>";
//var_dump($movie);
//echo "</Pre>";

// Parametres du header
$pageTitle = "Movie informations";
$customCssLinks = ['<link rel="stylesheet" href="../style/movieInformations.css">'];
?>
    <!-- HEADER -->
<?php require __DIR__ . DIRECTORY_SEPARATOR . "partial" . DIRECTORY_SEPARATOR . "header.php"; ?>

    <!-- BODY -->
    <H1 class="text-center">Welcome to page Movie Informations</H1>

    <div class="main">
        <aside class="leftPart">
            <img src="<?= $movie->getCover() ?>">
        </aside>
        <form class="mainPart">
            <div class="mb-3">
                <label for="title" class="form-label">Title :</label>
                <input type="text" class="form-control" id="title" aria-describedby="titleHelp"
                       value="<?= $movie->getTitle() ?>" disabled>
                <div id="titleHelp" class="form-text">The title of the movie.</div>
            </div>
            <div class="mb-3">
                <label for="synopsis" class="form-label">Synopsis :</label>
                <textarea type="text" class="form-control" id="synopsis" aria-describedby="synopsisHelp"
                          value="<?= $movie->getSynopsis() ?>" disabled><?= $movie->getSynopsis() ?></textarea>
                <div id="synopsisHelp" class="form-text">The synopsis of the movie.</div>
            </div>
            <div class="mb-3">
                <label for="director" class="form-label">Director :</label>
                <input type="text" class="form-control" id="director" aria-describedby="directorHelp"
                       value="<?= $movie->directorName ?>" disabled>
                <div id="directorHelp" class="form-text">The director of the movie.</div>
            </div>
            <div class="mb-3">
                <label for="compositor" class="form-label">Compositor :</label>
                <input type="text" class="form-control" id="compositor" aria-describedby="compositorHelp"
                       value="<?= $movie->compositorName ?>" disabled>
                <div id="compositorHelp" class="form-text">The compositor of the movie.</div>
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre :</label>
                <input type="text" class="form-control" id="genre" aria-describedby="genreHelp"
                       value="<?= $movie->getGenre() ?>" disabled>
                <div id="genreHelp" class="form-text">The genre of the movie.</div>
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Duration :</label>
                <input type="text" class="form-control" id="duration" aria-describedby="durationHelp"
                       value="<?= $movie->getDurationFormatted() ?>" disabled>
                <div id="releasedAtHelp" class="form-text">The duration of the movie.</div>
            </div>
            <div class="mb-3">
                <label for="releasedAt" class="form-label">Released at :</label>
                <input type="text" class="form-control" id="releasedAt" aria-describedby="releasedAtHelp"
                       value="<?= $movie->getReleasedAtFormatted() ?>" disabled>
                <div id="releasedAtHelp" class="form-text">The released date of the movie.</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <aside class="rightPart">
            <table class="table table-dark table-striped table-hover">
                <thead>
                <tr>
                    <th class="col-md-3">Actors :</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($actors as $key => $actor) : ?>
                    <tr>
                        <td><?= $actor->getActorName() ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </aside>
    </div>

    <a href="../view/movie.php"><button class="btn btn-dark">Return to movies</button></a>

    <!-- FOOTER -->
<?php require __DIR__ . DIRECTORY_SEPARATOR . "partial" . DIRECTORY_SEPARATOR . "footer.php"; ?>