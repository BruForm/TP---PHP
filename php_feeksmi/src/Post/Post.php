<?php

namespace App\Post;

use \DateTime;

class Post {

    public function __construct(
        private string $title,
        private string $content,
        private DateTime $createdAt = new DateTime(),
        private array $comments = [],
    ) {}


    public function getTitle(): string
    {
        return $this->title;
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
    public function getComments(): array
    {
        return $this->comments;
    }

    public function addComment(Comment $comment)
    {
        $this->comments[] = $comment;
    }
}
