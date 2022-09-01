<?php

namespace App;

use \DateTime;

class Album
{
    public function __construct(
        private int $id,
        private string $title,
        private DateTime $releaseDate,
        private int $numberOfSongs,
        private float $price,
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

    public function getReleaseDate(): DateTime
    {
        return $this->releaseDate;
    }
    public function setReleaseDate(string $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    public function getNnumberOfSongs(): int
    {
        return $this->numberOfSongs;
    }
    public function setNumberOfSongs(string $numberOfSongs): void
    {
        $this->numberOfSongs = $numberOfSongs;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function setPrice(string $price): void
    {
        $this->price = $price;
    }
}