<?php

function getQteProductFromCart(string $productId): int{
    return $_SESSION['cart'][$productId];
}

function changeQteProductInCart(string $productId, int $qte){
    $_SESSION['cart'][$productId] = $qte;
}

function deleteProductFromCart(string $productId){
    unset($_SESSION['cart'][$productId]);
}