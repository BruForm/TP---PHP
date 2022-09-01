<?php

abstract class Book
{
    public function __construct(
        protected string $title,
        protected string $author,
        protected string $style = "Classique",
        protected string $editor = "Flamarion",
    ) {

    }

    public function getTitle(): string
    {
        return $this->tite;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(float $author): void
    {
        $this->author = $author;
    }

    public function getStyle(): string
    {
        return $this->style;
    }

    public function setStyle(float $style): void
    {
        $this->style = $style;
    }

    public function getEditor(): string
    {
        return $this->editor;
    }

    public function setEditor(float $editor): void
    {
        $this->editor = $editor;
    }

    // public function getAllData(): string
    public function __toString(): string
    {
        // $text = null;
        // $textP = null;
        // $textN = null;
        // if ($this->weight > 0) {
        //     $weightSize = $this->weight;
        //     $unity = "g";
        //     $textP = "physique est de $weightSize $unity";
        // }
        // if ($this->fileSize > 0) {
        //     $weightSize = $this->fileSize;
        //     $unity = "ko";
        //     $textN = "numérique est de $weightSize $unity";
        // }
        // if ($textP != null && $textN != null) {
        //     $text = "Son poids $textP et son poids $textN. \n";
        // }
        // elseif($textP == null && $textN == null){
        //     $text = "";
        // }
        // else{
        //     $text = "Son poids $textP$textN.\n";
        // }

        // return "\"$this->title\" écrit par $this->author est un livre de $this->style aux éditions $this->editor. \n$text";
        return "\"$this->title\" écrit par $this->author est un livre de $this->style aux éditions $this->editor. \n";
    }
}

// $lndt = new Book("La nuit des temps", "René Barjavel", 222, 0, "SF");
// $test = new Book("L'histoire du test", "Test Ostérone", 444, 666);
// $ladk = new Book("L'appel de Ktulu", "H.P. Lovecraft", 0, 1024, "Fantastique Horreur");
// $vide = new Book("L'histoire du test VIDE", "Test Ostérone", 0, 0);

// // echo "----------------------------------\n";
// // echo $lndt->getAllData();
// // echo $ladk->getAllData();
// // echo $vide->getAllData();
// // echo $test->getAllData();
// echo "----------------------------------\n";
// echo $lndt;
// echo $ladk;
// echo $vide;
// echo $test;
// echo "----------------------------------\n";