<?php

require_once "Player.php";

class Knight extends Player {

    public function __construct(string $name, string $team)
    {
        parent::__construct($name, 160, $team);
    }

    public function defense(int $damagePoints)
    {
        return $damagePoints = max(0, $damagePoints - 10);
    }
}   