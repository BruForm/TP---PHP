<?php
session_start();

include './data/products.php';

$page = 'details';

// session_destroy();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    // get the data of the id
    foreach ($products as $product) {
        if ($id === $product['id']) {
            $currentProduct = $product;
            break 1;
        }
    }
};

$pageTitle = "Détails: " . $currentProduct['name'];
$customCssLinks = ['<link rel="stylesheet" href="/assets/details.css">'];


//Controle de la quantite à ajouter au panier :

$qteIsNeg = false;

// echo "<pre>" . var_dump($_SESSION) . "</pre><br>";
if ((isset($_POST['quantity']) && !empty($_POST['quantity']) && $_POST['quantity'] > 0)
    || (isset($_POST['quantity']) && !empty($_POST['quantity']) && $_POST['quantity'] < 0
        && isset($_SESSION['cart'][$currentProduct['id']]))
) {
    if (
        $_POST['quantity'] < 0 &&
        $_SESSION['cart'][$currentProduct['id']] < -$_POST['quantity']
    ) {
        $qteIsNeg = true;
    } else {
        if (isset($_SESSION['cart'][$currentProduct['id']])) {
            //Si on supprime tous les articles, on enlève l'article du panier
            if ($_SESSION['cart'][$currentProduct['id']] == -$_POST['quantity']) {
                unset($_SESSION['cart'][$currentProduct['id']]);
            } else {
                // sinon on modifie la quantité dans le panier
                $_SESSION['cart'][$currentProduct['id']] += $_POST['quantity'];
            }
        } else {
            $_SESSION['cart'][$currentProduct['id']] = $_POST['quantity'];
        }
        header('location: ./cart.php');
    }
}

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
                    <input type="number" name="quantity" placeholder="Quantité...">
                    <input type="submit" value="Ajouter au panier">
                </form>
            </div>
            <?php if ($qteIsNeg) : ?>
                <span style="color: red;text-align: right;">Vous ne pouvez pas retirer plus de produit qu'il n'y en a au panier !</span>
            <?php endif ?>
        </div>
    </div>
</main>
<?php include('./partials/footer.php') ?>