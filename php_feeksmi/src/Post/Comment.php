<?php

namespace App\Post;

use \DateTime;

class Comment {

    public function __construct(
        private string $author,
        private string $content,
        private DateTime $createdAt = new DateTime(),
    ) {}

    public function getAuthor()
    {
        return $this->author;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }
    public function getCreatedAtFormated($format = "Y/m/d"): string
    {
        return date_format($this->createdAt, $format);
    }
}
