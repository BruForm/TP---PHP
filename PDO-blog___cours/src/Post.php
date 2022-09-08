<?php
namespace App;

class Post
{
    private int $id;
    private string $title;
    private string $content;
    private string $author;
    private string $creationDate;

    public function getId(): int{
        return $this->id;
    }
    public function setId($id): void{
        $this->id = $id;
    }

    public function getTitle(): string{
        return $this->title;
    }
    public function setTitle($title): void{
        $this->title = $title;
    }

    public function getContent(): string{
        return $this->content;
    }
    public function setContent($content): void{
        $this->content = $content;
    }

    public function getAuthor(): string{
        return $this->author;
    }
    public function setAuthor($author): void{
        $this->author = $author;
    }

    public function getCreationDate(): String{
        return $this->creationDate;
    }
    public function setCreationDate($creationDate): void{
        $this->creationDate = $creationDate;
    }
}

