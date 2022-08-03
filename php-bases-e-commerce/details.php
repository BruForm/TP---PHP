<?php
session_start();

// include './data/products.php';
require_once './functions/details.php';

$page = 'details';

// session_destroy();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // get the data of the product
    $currentProduct = getProductData($id);  // utilisation function

    // foreach ($products as $product) {            // utilisation function
    //     if ($id === $product['id']) {            // utilisation function
    //         $currentProduct = $product;          // utilisation function
    //         break 1;                             // utilisation function
    //     }                                        // utilisation function
    // }                                            // utilisation function
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
    $inputQte = $_POST['quantity'];

    if (
        $_POST['quantity'] < 0 &&
        $_SESSION['cart'][$currentProduct['id']] < -$_POST['quantity']
    ) {
        $qteIsNeg = true;
    } else {
        if (isset($_SESSION['cart'][$currentProduct['id']])) {
            //Si on supprime tous les articles, on enlève l'article du panier
            // if ($_SESSION['cart'][$currentProduct['id']] == -$_POST['quantity']) {       // utilisation function
            if (getQteProductFromCart($currentProduct['id']) == -$inputQte) {               // utilisation function
                // unset($_SESSION['cart'][$currentProduct['id']]);                         // utilisation function
                deleteProductFromCart($currentProduct['id']);                               // utilisation function
            } else {
                // sinon on modifie la quantité dans le panier
                // $_SESSION['cart'][$currentProduct['id']] += $_POST['quantity'];          // utilisation function
                changeQteProduct($currentProduct['id'], $inputQte);                         // utilisation function
            }
        } else {
            // $_SESSION['cart'][$currentProduct['id']] = $_POST['quantity'];               // utilisation function
            addProductToCart($currentProduct['id'], $inputQte);                             // utilisation function
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