<?php

namespace App\Characters;

class Archer extends Player{
  public function __construct(string $name, float $flawa, string $team)
  {
    parent::__construct($name, 190, $flawa, $team);
  }

  public function multiAttack(Player $target): self
  {
    if (!$this -> checkTeam($target)) {
      return $this;
    }

    for ($arrow = 1; $arrow <= 3; $arrow++) {
      if ($target -> getHealth() <= 0) {
        break;
      }

      parent::attack($target);
    }

    return $this;
  }
}
