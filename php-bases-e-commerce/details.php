<?php
session_start();

require './data/products.php';
require_once './functions/details.php';

$page = 'details';

// session_destroy();


// Utilisation function - SUPPR DEBUT
// if (isset($_GET['id']) && !empty($_GET['id'])) {
//     $id = $_GET['id'];
//     // get the data of the product
//     foreach ($products as $product) {
//         if ($id === $product['id']) {
//             $currentProduct = $product;
//             break 1;
//         } 
//     }
// };
// Utilisation function - SUPPR FIN

// Utilisation function - DEBUT
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // get the data of the product
    $currentProduct = getProductData($id, $products);
};
// utilisation function - FIN

$pageTitle = "Détails: " . $currentProduct['name'];
$customCssLinks = ['<link rel="stylesheet" href="/assets/details.css">'];


//Controle de la quantite à ajouter au panier :

$qteIsNeg = false;

// echo "<pre>" . var_dump($_SESSION) . "</pre><br>";

// Utilisation function - SUPPR DEBUT
// if ((isset($_POST['quantity']) && !empty($_POST['quantity']) && $_POST['quantity'] > 0)
//     || (isset($_POST['quantity']) && !empty($_POST['quantity']) && $_POST['quantity'] < 0
//         && isset($_SESSION['cart'][$currentProduct['id']]))
// ) {
//     $inputQte = $_POST['quantity'];
//     if (
//         $_POST['quantity'] < 0 &&
//         $_SESSION['cart'][$currentProduct['id']] < -$_POST['quantity']
//     ) {
//         $qteIsNeg = true;
//     } else {
//         if (isset($_SESSION['cart'][$currentProduct['id']])) {
//             //Si on supprime tous les articles, on enlève l'article du panier
//             if ($_SESSION['cart'][$currentProduct['id']] == -$_POST['quantity']) { 
//                 unset($_SESSION['cart'][$currentProduct['id']]); 
//             } else {
//                 // sinon on modifie la quantité dans le panier
//                 $_SESSION['cart'][$currentProduct['id']] += $_POST['quantity'];
//             }
//         } else {
//             $_SESSION['cart'][$currentProduct['id']] = $_POST['quantity']; 
//         }
//         header('location: ./cart.php');
//     }
// }
// Utilisation function - SUPPR FIN

// Utilisation function - DEBUT
if ((isset($_POST['quantity']) && !empty($_POST['quantity']) && $_POST['quantity'] > 0)
    || (isset($_POST['quantity']) && !empty($_POST['quantity']) && $_POST['quantity'] < 0
        && isset($_SESSION['cart'][$currentProduct['id']]))
) {
    $inputQte = $_POST['quantity'];

    if (
        $inputQte < 0 &&
        getQteProductFromCart($currentProduct['id']) < -$inputQte
    ) {
        $qteIsNeg = true;
    } else {
        if (productExistsInCart($currentProduct['id'])){
            //Si on supprime tous les articles, on enlève l'article du panier
            if (getQteProductFromCart($currentProduct['id']) == -$inputQte) {
                deleteProductFromCart($currentProduct['id']);
            } else {
                // sinon on modifie la quantité dans le panier
                addQteProductInCart($currentProduct['id'], $inputQte);
            }
        } else {
            addProductToCart($currentProduct['id'], $inputQte);
        }
        header('location: ./cart.php');
    }
}
// Utilisation function - FIN

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