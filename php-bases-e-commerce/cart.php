<?php
session_start();

require_once './functions/cart.php';

$page = 'cart';
$pageTitle = "Panier";
$customCssLinks = ['<link rel="stylesheet" href="/assets/cart.css">'];

//Recuperation des infos du panier :
include './data/products.php';
$total = 0;

if (isset($_POST['productToDelete'])) {
    unset($_SESSION['cart'][$_POST['productToDelete']]);
}

//Controle modification quantite via input

if (isset($_POST['productToChange']) && isset($_POST['qte'])) {
    $InputproductId = $_POST['productToChange'];
    $Inputqte = $_POST['qte'];
    if (getQteProductFromCart($InputproductId) != $Inputqte) {
        if ($Inputqte > 0) {
            changeQteProductInCart($InputproductId, $Inputqte);
        } else {
            deleteProductFromCart($InputproductId);
        }
    }
}

?>

<?php include('./partials/header.php'); ?>
<main class="cart-main">
    <div class="page-content-header">
        <h1>
            <?= $pageTitle ?>
        </h1>
    </div>

    <div class="page-content">
        <div class="cart-details">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th class="price-cell">Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) : ?>
                        <?php foreach ($_SESSION['cart'] as $productId => $qte) : ?>
                            <tr>
                                <td>
                                    <form action="" method="POST">
                                        <input type="hidden" name="productToDelete" id="productToDelete" value="<?= $productId ?>">
                                        <button type="submit" class="fa-solid fa-xmark" style="background: transparent; border: none;"></button>
                                    </form>
                                </td>
                                <td><a href="./details.php?id=<?= $productId ?>" style="text-decoration: none;color: white;">
                                        <?= $products[$productId]['name'] ?>
                                    </a>
                                </td>
                                <td>
                                    <form action="" method="POST" style="display: flex; height: fit-content;">
                                        <input type="hidden" name="productToChange" id="productToChange" value="<?= $productId ?>">
                                        <input type="number" name="qte" id="qte" value="<?= $qte ?>" style="width: 70px; text-align: center;font-weight: bolder; 
                                        background-color: transparent; color: white; 
                                        border: 1px solid white; border-radius: 4px;">
                                        <button type="submit" style="height: 25px;">Modifier</button>
                                    </form>
                                </td>
                                <td class="price-cell">
                                    <?php $total += $qte * $products[$productId]['price'] ?>
                                    <?= number_format($qte * $products[$productId]['price'], 2) ?>
                                    €</td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="price-cell" colspan="4">Total: <?= number_format($total, 2) ?>€</td>
                    </tr>
                </tfoot>
            </table>
            <button>Commander</button>
        </div>
    </div>
</main>
<?php include('./partials/footer.php') ?>