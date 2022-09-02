<?php

namespace App\Entity;

use App\Entity\Artist;

use App\Service\FormatService;

class Song
{
    public function __construct(
        private int $id,
        private string $title,
        private int $duration,
        private float $price,
        private array $artists,
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
    public function getDurationFormated(): string
    {
        return FormatService::formatDuration($this->duration);
    }
    public function setDuration(string $duration): void
    {
        $this->duration = $duration;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
    public function getPriceByCurrency($currency = "€"): string
    {
        return FormatService::formatPrice($this->price, $currency);
    }
    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    public function getArtists(): array
    {
        return $this->artists;
    }
    public function setArtists(array $artists): void
    {
        $this->artists = $artists;
    }
    public function addArtist(Artist $artist): void
    {
        array_push($this->artists, $artist);
    }
}
