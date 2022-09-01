<?php

namespace App;

class ArtistStyle
{
    public function __construct(
        private int $id,
        private int $artistId,
        private array $stylesId,
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

    public function getArtistId(): int
    {
        return $this->artistId;
    }
    public function setArtistId(string $artistId): void
    {
        $this->artistId = $artistId;
    }

    public function getStylesId(): array
    {
        return $this->stylesId;
    }
    public function setStylesId(int $stylesId): void
    {
        $this->stylesId = $stylesId;
    }
}
