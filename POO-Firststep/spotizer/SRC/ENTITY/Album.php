<?php

namespace App\Entity;

use App\Entity\Song;

use App\Service\FormatService;
use \DateTime;

class Album
{
    public function __construct(
        private int $id,
        private string $title,
        private DateTime $releaseDate,
        private int $numberOfSongs,
        private float $price,
        private array $songs,
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
    public function getReleaseDateFormated(string $format = "Y/m/d"): string
    {
        return FormatService::formatDate($this->releaseDate, $format);
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
    public function getPriceByCurrency(string $currency = "€"): string
    {
        return FormatService::formatPrice($this->price, $currency);
    }
    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    public function getSongs(): array
    {
        return $this->songs;
    }
    public function setSongs(array $songs): void
    {
        $this->songs = $songs;
    }
    public function addSong(Song $song): void
    {
        array_push($this->songs, $song);
    }

    public function getDuration(bool $isFormated = false): string
    {
        $dur = 0;
        foreach ($this->getSongs() as $song) {
            $dur += $song->getDuration();
        }
        if ($isFormated) {
            return FormatService::formatDuration($dur);
        }
        return $dur;
    }
}
