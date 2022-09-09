<?php

namespace App\Entity;

class Actor extends StaffMember
{
    private string $actorName;

    /**
     * @return string
     */
    public function getActorName(): string
    {
        return $this->actorName;
    }

    /**
     * @param string $actorName
     */
    public function setActorName(string $actorName): void
    {
        $this->actorName = $actorName;
    }
}
