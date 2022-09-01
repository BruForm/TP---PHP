<?php
namespace App;
use App\Perso;

class Monster extends Perso
{
    public function __construct(
        $name,
        $hp = 50,
        $mp = 50,
        $attack = 50,
        $defense = 50,
        $shield = true,
        $agility = 50,
        $chance = 50,
        private string $speMoveName = "Rush",
        private int $speMoveDamage = 30
    ) {
        parent::__construct($name, $hp, $mp, $attack, $defense, true, $agility, $chance);
    }

    public function getSpeMoveName(): string
    {
        return $this->speMoveName;
    }
    public function setSpeMoveName(string $speMoveName): void
    {
        $this->speMoveName = $speMoveName;
    }

    public function getSpeMoveDamage(): int
    {
        return $this->speMoveDamage;
    }
    public function setSpeMoveDamage(int $speMoveDamage): void
    {
        $this->speMoveDamage = $speMoveDamage;
    }

    public function attack(Perso $target, int $attackType)
    {
        // Attack type 1 => attaque noramle
        // Attack type 2 => attaque speciale
        if ($target->getDefense() > 0) {
            if ($attackType === 1) {
                $hitPoints = hitPoints($this->attack, $this->agility, $this->chance);
            }
            if ($attackType === 2) {
                $hitPoints = hitPoints($this->speMoveDamage, $this->agility, $this->chance);
            }
            $target->setDefense($target->getDefense() - $hitPoints);
        } else {
            if ($attackType === 1) {
                $hitPoints = hitPoints($this->attack, $this->agility, $this->chance);
            }
            if ($attackType === 2) {
                $hitPoints = hitPoints($this->speMoveDamage, $this->agility, $this->chance);
            }
            $target->setHp($target->getHp() - $hitPoints);
        }
        echo $this->getName() . " inflige $hitPoints dégats \n";
    }
}
