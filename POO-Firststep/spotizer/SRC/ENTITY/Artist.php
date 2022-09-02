<?php

namespace App\Entity;
use App\Entity\Style;

use App\Service\FormatService;
use \DateTime;

class Artist
{
    public function __construct(
        private int $id,
        private string $name,
        private string $nationality,
        private DateTime $beginingDate,
        private array $styles,
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
    public function getBeginingDateFormated($format = "Y/m/d"): string
    {
        return FormatService::formatDate($this->beginingDate, $format);
    }
    public function setBeginingDate(string $beginingDate): void
    {
        $this->beginingDate = $beginingDate;
    }

    public function getStyles(): array
    {
        return $this->styles;
    }
    public function setStyles(array $styles): void
    {
        $this->styles = $styles;
    }
    public function addStyle(Style $style): void
    {
        array_push($this->styles, $style);
    }
}
