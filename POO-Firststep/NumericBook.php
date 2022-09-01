<?php
require_once "./Book.php";
class NumericBook extends Book
{
    public function __construct(
        private float $fileSize = 0,
    ) {
    }

    public function getFileSizet(): string
    {
        return $this->fileSize;
    }

    public function setFileSize(float $fileSize): void
    {
        $this->author = $fileSize;
    }

    // public function getAllData(): string
    public function __toString(): string
    {
        $text = null;
        $textP = null;
        $textN = null;
        if ($this->weight > 0) {
            $weightSize = $this->weight;
            $unity = "g";
            $textP = "physique est de $weightSize $unity";
        }
        if ($this->fileSize > 0) {
            $weightSize = $this->fileSize;
            $unity = "ko";
            $textN = "numérique est de $weightSize $unity";
        }
        if ($textP != null && $textN != null) {
            $text = "Son poids $textP et son poids $textN. \n";
        } elseif ($textP == null && $textN == null) {
            $text = "";
        } else {
            $text = "Son poids $textP$textN.\n";
        }

        return "\"$this->title\" écrit par $this->author est un livre de $this->style aux éditions $this->editor. \n$text";
    }
}

// $lndt = new Book("La nuit des temps", "René Barjavel", "SF");
// $lndt = new PhysicalBook(222);

// echo "----------------------------------\n";
// echo $lndt;
// echo "----------------------------------\n";
