<?php
session_start();

include './data/products.php';

$page = 'details';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    // get the data of the id
    foreach ($products as $product) {
        if ($id === $product['id']) {
            $currentProduct = $product;
            // $name = $product['name'];
            // $description = $product['description'];
            // $price = $product['price'];
            break 1;
        }
    }
};

$pageTitle = "Détails: " . $currentProduct['name'];
$customCssLinks = ['<link rel="stylesheet" href="/assets/details.css">'];


?>

<?php include('./partials/header.php'); ?>
<main class="details-main">
    <div class="page-content-header">
        <h1>
            <?= $pageTitle ?>
        </h1>
    </div>

    <div class="page-content">
        <div class="product-img"></div>
        <div class="product-details">
            <div class="description">
                <p><?= $currentProduct['description'] ?></p>
                <p><?= $currentProduct['description'] ?></p>
            </div>
            <div class="bottom-details">
                <div class="price"><?= number_format($currentProduct['price'], 2) ?><span class="currency">€</span></div>
                <form method="post" class="add-to-cart-form">
                    <input type="number" name="quantity" placeholder="Quantité..">
                    <input type="submit" value="Ajouter au panier">
                </form>
            </div>
        </div>
    </div>
</main>
<?php include('./partials/footer.php') ?>