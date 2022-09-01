<?php
namespace App;
use App\Perso;

class Wizzard extends Perso
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
        private string $spellName = "Fire Ball",
        private int $spellDamage = 45,
    ) {
        parent::__construct($name, $hp, $mp, $attack, $defense, true, $agility, $chance);

        if ($this->hp > 66) {
            $this->hp = 66;
        }
        if ($this->attack > 15) {
            $this->attack = 15;
        }
    }

    public function getSpellName(): string
    {
        return $this->spellName;
    }
    public function setSpellName(string $spellName): void
    {
        $this->spellName = $spellName;
    }

    public function getSpellDamage(): int
    {
        return $this->spellDamage;
    }
    public function setSpellDamage(int $spellDamage): void
    {
        $this->spellDamage = $spellDamage;
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
                $hitPoints = hitPoints($this->spellDamage, $this->agility, $this->chance);
            }
            $target->setDefense($target->getDefense() - $hitPoints);
        } else {
            if ($attackType === 1) {
                $hitPoints = hitPoints($this->attack, $this->agility, $this->chance);
            }
            if ($attackType === 2) {
                $hitPoints = hitPoints($this->spellDamage, $this->agility, $this->chance);
            }
            $target->setHp($target->getHp() - $hitPoints);
        }
        echo $this->getName() . " inflige $hitPoints dégats \n";
    }
}
