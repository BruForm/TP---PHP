<?php

namespace App\Entity;

class Director extends StaffMember
{
    private string $directorName;

    /**
     * @return string
     */
    public function getDirectorName(): string
    {
        return $this->directorName;
    }

    /**
     * @param string $directorName
     */
    public function setDirectorName(string $directorName): void
    {
        $this->directorName = $directorName;
    }
}
