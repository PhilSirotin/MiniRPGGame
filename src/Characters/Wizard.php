<?php

namespace App\Characters;

use App\Cube\CubeD8;
use App\Cube\CubeD12;

class Wizard extends Player{
  public function __construct(string $name, float $flawa, string $team)
  {
    parent::__construct($name, 190, $flawa, $team);
  }

  public function defense(int $damagePoints): mixed
  {
    $cubeD8 = new CubeD8() -> cubeD8R();

    if ($cubeD8 > 3){
      $damagePoints = max(0, $damagePoints - $cubeD8);
    } else {
      echo 'Защита не удалась';
    }

    return $damagePoints;
  }

  public function splash(array $players): void
  {
    $cubeD12 = new CubeD12();
    $damage = $cubeD12 -> cubeD12R();

    foreach ($players as $player) {
      if ($player -> getTeam() === $this -> getTeam()) {
        continue;
      }
      $player -> damage($damage);
    }
  }
}
