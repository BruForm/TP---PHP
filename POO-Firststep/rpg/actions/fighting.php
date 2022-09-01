<?php
require_once 'vendor/autoload.php';
use App\Perso;

function hitPoints($hitpoints, $agility = 25, $chance = 10): int
{
    $spe = false;
    if (rand(1, 100) <= $agility) {
        $spe = true;
    }

    if (rand(1, 100) <= $chance) {
        echo "Coup critique !\n";
        if ($spe) {
            echo "  / \  \n";
            echo "  |||  \n";
            echo "  \ /  \n";
        } else {
            echo "  / \  \n";
            echo "   |   \n";
            echo "  \ /  \n";
        }
        return floor($hitpoints * 1.5);
    }
    if ($spe) {
        echo "  / \  \n";
        echo "  |||  \n";
        echo "  |||  \n";
    } else {
        echo "  / \  \n";
        echo "   |   \n";
        echo "   |   \n";
    }
    return $hitpoints;
}

function fight(Perso $fighter1, Perso $fighter2)
{
    $stop = false;
    while (!$stop) {
        echo "====== " . $fighter1->getName() . " attaque " . $fighter2->getName() . " ======\n";
        $fighter1->attack($fighter2, 1);
        $fighter2->status();

        if ($fighter2->getHp() > 0) {
            echo "------ " . $fighter2->getName() . " réplique ------\n";
            $fighter2->attack($fighter1, 1);
            $fighter1->status();
        }

        if ($fighter1->getHp() <= 0 || $fighter2->getHp() <= 0) {
            $stop = true;
        }
    }
}
