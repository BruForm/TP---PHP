<?php

namespace App\Entity;

class Compositor extends StaffMember
{
    private string $compositorName;

    /**
     * @return string
     */
    public function getCompositorName(): string
    {
        return $this->compositorName;
    }

    /**
     * @param string $compositorName
     */
    public function setCompositorName(string $compositorName): void
    {
        $this->compositorName = $compositorName;
    }
}
