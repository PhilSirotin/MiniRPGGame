<?php

namespace MiniRPG\Characters;

class Knight extends Player {

    public function __construct(string $name, string $team)
    {
        parent::__construct($name, 190, $team);
    }

    public function defense(int $damagePoints): mixed
    {
        return $damagePoints = max(0, $damagePoints - 10);
    }
}   
