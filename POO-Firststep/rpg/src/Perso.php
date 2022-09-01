<?php
namespace App;

abstract class Perso
{
    public function __construct(
        protected string $name,
        protected int $hp = 50,
        protected int $mp = 50,
        protected int $attack = 50,
        protected int $defense = 50,
        protected bool $shield = true,
        protected int $agility = 50,
        protected int $chance = 50,
    ) {
        if ($this->defense <= 0) {
            $this->setShield(false);
        }
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getHp(): int
    {
        return $this->hp;
    }
    public function setHP(string $hp): void
    {
        $this->hp = $hp;
    }

    public function getMp(): int
    {
        return $this->Mp;
    }
    public function setMP(string $mp): void
    {
        $this->mp = $mp;
    }

    public function getAttack(): int
    {
        return $this->attack;
    }
    public function setAttack(string $attack): void
    {
        $this->attack = $attack;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }
    public function setDefense(string $defense): void
    {
        $this->defense = $defense;
    }

    public function getShield(): bool
    {
        return $this->shield;
    }
    public function setShield(bool $shield): void
    {
        $this->shield = $shield;
    }

    public function getAgility(): int
    {
        return $this->agility;
    }
    public function setAgility(string $agility): void
    {
        $this->agility = $agility;
    }

    public function getChance(): int
    {
        return $this->chance;
    }
    public function setChance(string $chance): void
    {
        $this->chance = $chance;
    }

    abstract function attack(Perso $target, int $attackType);

    public function isDead()
    {
        if ($this->hp <= 0) {
            echo "    |   \n";
            echo " ===O===\n";
            echo "    |   \n";
            echo "    |   \n";
            echo "    |   \n";
            $this->setHP(0);
            echo "$this->name est mort dans d'affreuses souffrances !!!\n\n";
        } else {
            echo "    *   \n";
            echo "  *   * \n";
            echo " *  *  *\n";
            echo "  *   * \n";
            echo "    *   \n";
            echo "$this->name a survécu à l'attaque !!!\n\n";
        }
    }

    public function status()
    {
        if ($this->defense <= 0 && $this->getShield()) {
            echo "$this->name a perdu son armure !\n";
            echo " /---\ \n";
            echo " | X | \n";
            echo " \---/ \n";
            $this->setDefense(0);
            $this->setShield(false);
        }
        echo "il reste $this->defense défense et $this->hp HP à $this->name !\n";
        $this->isDead();
    }
}
