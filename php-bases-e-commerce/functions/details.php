<?php

function getProductData(string $productId, array $products) : array
{
    foreach ($products as $product) {
        if ($productId === $product['id']) {
            return $product;
        }
    }
    return [];
}

function productExistsInCart(string $productId): bool{

    if (isset($_SESSION['cart'][$productId])) return true;
    else return false;
}

function getQteProductFromCart(string $productId): int{
    return $_SESSION['cart'][$productId];
}

function addQteProductInCart(string $productId, int $qte){
    $_SESSION['cart'][$productId] += $qte;
}

function addProductToCart(string $productId, int $qte){
    $_SESSION['cart'][$productId] = $qte;
}

function deleteProductFromCart(string $productId){
    unset($_SESSION['cart'][$productId]);
}