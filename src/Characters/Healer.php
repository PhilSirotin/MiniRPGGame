<?php

namespace App\Characters;

use App\Characters\Player;
use App\Cube\CubeD12;
use App\Cube\CubeD10;

class Healer extends Player{
  public function __construct(string $name, float $flawa, string $team)
  {
    parent::__construct($name, 190, $flawa, $team);
  }

  public function checkHeal(Player $ally): bool
  {
      if ($this->getTeam() !== $ally->getTeam()) {
          echo 'Восстанавливать здоровье противнику нельзя<br />';
          return false;
      }

      return true;
  }

  public function healAlly(Player $ally): self
  {
    if (!$this -> checkHeal($ally)){
      return $this;
    }

    $healPoints = (new CubeD12()) -> cubeD12R();
    $ally -> heal($healPoints);

    return $this;
  }

  public function teamHeal(array $players): self
  {
    $healPoints = (new CubeD10() -> cubeD10R());

    foreach ($players as $player) {
      if ($player -> getTeam() !== $this -> getTeam()) {
        continue;
      }

      $player -> heal($healPoints);
    }

    return $this;
  }
 }
