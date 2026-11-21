<?php

namespace App\Characters;

class Knight extends Player {

  public function __construct(string $name, float $flawa, string $team)
  {
    parent::__construct($name, 190, $flawa, $team);
  }

  public function defense(int $damagePoints): mixed
  {
    return $damagePoints = max(0, $damagePoints - 10);
  }
}
