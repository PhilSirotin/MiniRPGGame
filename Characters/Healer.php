<?php

namespace MiniRPG\Characters;

use MiniRPG\Characters\Player;
use MiniRPG\Cube\CubeD12;
use MiniRPG\Cube\CubeD10;

class Healer extends Player
{
    public function __construct(string $name, string $team)
    {
        parent::__construct($name, 190, $team);
    }

    public function healAlly(Player $ally) : self
    {
        if ($this -> getTeam() != $ally -> getTeam())
            {
                echo 'Восстанавливать здоровье противнику нельзя' . '<br />';
                return $this;
            }

            $healPoints = (new CubeD12()) -> cubeD12R();
            $ally -> restoreHealth($healPoints);

            return $this;
    }

public function teamHeal(array $players): self
{
    $healPoints = (new CubeD10())->cubeD10R();

    foreach ($players as $player) {
        if ($player->getTeam() !== $this->getTeam()) {
            continue;
        }

        $player->restoreHealth($healPoints);
    }

    return $this;
}
    
}