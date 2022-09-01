<?php

class Product
{
    // public $name;
    // public $description;
    // public $price;

    // public function __construct($name, $description, $price)
    public function __construct(
        private string $name,
        private string $description,
        private float $price,
    ) {
        // $this->name = $name;
        // $this->description = $description;
        // $this->price = $price;

        // Test si prix negatif lors de la construction de l'objet
        $this->setPrice($this->price);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(float $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDesription(float $description): void
    {
        $this->description = $description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        if ($price < 0) {
            $price = 0;
        }
        $this->price = $price;
    }

    public function getPriceCents(): int
    {
        return $this->price * 100;
    }

    public function setPriceCents(): int
    {
        return $this->price *= 100;
    }

    public function getPriceCurrency(string $currency = "€"): string
    {
        // return str_replace(".", ",", $this->price);
        switch ($currency) {
            case "€" : return number_format($this->price, 2, ',', " ") . " €";
            case "$" : return number_format($this->price, 2, '.', ",") . " $";
        }
    }
}

$product = new Product("Savon", "blabla", 1010.55);

echo 'prix : ' . $product->getprice() . PHP_EOL;
echo 'prix en cents (non réaffecté) : ' . $product->getPriceCents() . PHP_EOL;
// echo 'prix en cents (réaffecté)  : ' . $product->setPriceCents() . PHP_EOL;
echo 'prix en euros   : ' . $product->getPriceCurrency() . PHP_EOL;
echo 'prix en dollars : ' . $product->getPriceCurrency("$") . PHP_EOL;
