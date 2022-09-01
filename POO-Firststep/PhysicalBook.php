<?php
require_once "./Book.php";

class PhysicalBook extends Book
{
    public function __construct(
        $title,
        $author,
        $style,
        $editor,
        private float $weight,
    ) {
        parent::__construct($title, $author, $style, $editor);
    }

    public function getWeight(): string
    {
        return $this->weight;
    }

    public function setWeight(float $weight): void
    {
        $this->author = $weight;
    }

    // public function getAllData(): string
    public function __toString(): string
    {
        return parent::__toString() . "Son poids est de $this->weight" . "g.\n";
    }
}

$lndtP = new PhysicalBook("La nuit des temps", "René Barjavel", "SF", "toto", 222);

echo "----------------------------------\n";
echo $lndtP;
echo "----------------------------------\n";
