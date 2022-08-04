<?php
session_start();

require './data/products.php';
require_once './functions/index.php';

$page = 'index';
$pageTitle = "Les produits";
$customCssLinks = ['<link rel="stylesheet" href="/assets/index.css">'];

// Determination du nombre page
$nbProductByPage = 8;
$nbOfPages = getNbOfPages(count($products), $nbProductByPage);


$currentPage = 1;
if (isset($_GET['page'])) {
    $currentPage = (int)$_GET['page'];
}

$firstProductOfPage = ($currentPage * $nbProductByPage) - ($nbProductByPage - 1);

?>

<?php include('./partials/header.php'); ?>
<main class="index-main">
    <div class="page-content-header">
        <h1>
            <?= $pageTitle ?>
        </h1>
        <div class="current-pagination">
            Page <?= $currentPage ?>
        </div>
    </div>

    <div class="page-content products">
        <?php
        $loop = 1;
        foreach ($products as $product) {
            if (($loop >= $firstProductOfPage) && ($loop <= ($firstProductOfPage + $nbProductByPage - 1))) {
                include('./partials/cards/product-card.php');
            }
            $loop++;
            if ($loop == ($firstProductOfPage + $nbProductByPage)) break;
        } ?>
    </div>

    <div class="pagination">
        <form action="" method="GET"></form>
        <?php for ($i = 1; $i <= $nbOfPages; $i++) : ?>
            <a href="/index.php?page=<?= $i ?>" class="pagination-link <?= ($i == $currentPage) ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor ?>
    </div>
</main>
<?php include('./partials/footer.php') ?>