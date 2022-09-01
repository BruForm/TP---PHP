<?php

namespace App;

use \DateTime;

class Artist
{
    public function __construct(
        private int $id,
        private string $name,
        private string $nationality,
        private DateTime $beginingDate,
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

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getNationality(): string
    {
        return $this->nationality;
    }
    public function setNationality(string $nationality): void
    {
        $this->nationality = $nationality;
    }

    public function getBeginingDate(): DateTime
    {
        return $this->beginingDate;
    }
    public function setBeginingDate(string $beginingDate): void
    {
        $this->beginingDate = $beginingDate;
    }
}
