<?php
session_start();
if (isset($_SESSION['spy'])) {
    $_SESSION['spy']['articles']++;
}

$title = 'Demo PHP view Articles';
$styleCSS = 'articles.css';

$articlesPage = 1;
if (isset($_GET['page'])) {
    $articlesPage = htmlspecialchars($_GET['page']);
}

?>

<!-- HEADER -->
<?php include '../partials/header.php' ?>

<!-- BODY -->
<div class="container">
    <h1>Articles</h1>

    Vous êtes sur la page <?= $articlesPage ?>

    <ul style="display: flex; gap: 2rem; list-style: none;">
        <?php foreach (range(1, 5) as $index) : ?>
            <button><a href="/pages/articles.php?page=<?= $index ?>"><?= $index ?></a></button>
        <?php endforeach ?>
    </ul>

</div>
<!-- FOOTER -->
<?php include '../partials/footer.php' ?>