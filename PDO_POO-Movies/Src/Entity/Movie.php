<?php

namespace App\Entity;

use \DateTime;

class Movie
{
    private int $id;
    private string $title;
    private int $duration;
    private string $cover;
    private string $synopsis;
    private string $releasedAt;
    private string $genre;
    private int $director_id;
    private int $compositor_id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     */
    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return string
     */
    public function getCover(): string
    {
        return $this->cover;
    }

    /**
     * @param string $cover
     */
    public function setCover(string $cover): void
    {
        $this->cover = $cover;
    }

    /**
     * @return string
     */
    public function getSynopsis(): string
    {
        return $this->synopsis;
    }

    /**
     * @param string $synopsis
     */
    public function setSynopsis(string $synopsis): void
    {
        $this->synopsis = $synopsis;
    }

    /**
     * @return DateTime
     */
    public function getReleasedAt(): string
    {
        return $this->releasedAt;
    }

    /**
     * @param string $releasedAt
     */
    public function setReleasedAt(string $releasedAt): void
    {
        $this->releasedAt = $releasedAt;
    }

    /**
     * @return string
     */
    public function getGenre(): string
    {
        return $this->genre;
    }

    /**
     * @param string $genre
     */
    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }

    /**
     * @return int
     */
    public function getDirectorId(): int
    {
        return $this->director_id;
    }

    /**
     * @param int $director_id
     */
    public function setDirectorId(int $director_id): void
    {
        $this->director_id = $director_id;
    }

    /**
     * @return int
     */
    public function getCompositorId(): int
    {
        return $this->compositor_id;
    }

    /**
     * @param int $compositor_id
     */
    public function setCompositorId(int $compositor_id): void
    {
        $this->compositor_id = $compositor_id;
    }

//    FONCTIONS

    public function getDurationFormatted($format = "Y/m/d"): string
    {
        return floor($this->duration / 60) . "h " . ((($this->duration % 60) < 10) ? "0" . $this->duration % 60 : $this->duration % 60) . "min";
    }

    public function getReleasedAtFormatted($format = "Y/m/d"): string
    {
        return (new DateTime($this->releasedAt))->format($format);
    }
}
