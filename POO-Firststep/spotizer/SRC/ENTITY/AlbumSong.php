<?php

namespace App;

class AlbumSong
{
    public function __construct(
        private int $id,
        private int $albumId,
        private array $songsId,
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

    public function getAlbumId(): int
    {
        return $this->albumId;
    }
    public function setAlbumId(string $albumId): void
    {
        $this->albumId = $albumId;
    }

    public function getSongsId(): array
    {
        return $this->songsId;
    }
    public function setSongId(int $songsId): void
    {
        $this->songsId = $songsId;
    }
}
