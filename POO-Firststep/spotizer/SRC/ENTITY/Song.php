<?php

namespace App;

class Song
{
    public function __construct(
        private int $id,
        private string $title,
        private int $duration,
        private float $price,
        private array $artistsId,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }
    public function setDuration(string $duration): void
    {
        $this->duration = $duration;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    public function getArtistsId(): array
    {
        return $this->artistsId;
    }
    public function setArtistsId(int $artistsId): void
    {
        $this->artistsId = $artistsId;
    }
}
