<?php

namespace MiniRPG\Characters;

use MiniRPG\Characters\Player;
use MiniRPG\Cube\CubeD12;

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
}