<div class="product-card">
    <div class="card-img"></div>
    <div class="card-content">
        <h2 class="product-title"><?= $product['name'] ?></h2>
        <div class="product-details">
            <a href="details.php?id=<?= $product['id'] ?>">Plus de détails</a>
            <div class="product-price"><?= number_format($product['price'], 2) ?><span class="currency">€</span></div>
        </div>
    </div>
</div>