<?php

namespace MiniRPG\Characters;

use MiniRPG\Cube\CubeD8;
use MiniRPG\Cube\CubeD12;

class Wizard extends Player
{
  public function __construct(string $name, string $team)
  {
    parent::__construct($name, 190, $team );
  }

  public function defense(int $damagePoints): mixed
  {
    $cubeD8 = new CubeD8();
    $resultD8 = $cubeD8 -> cubeD8R();

    if($resultD8 > 3) 
      {
        $damagePoints = max(0, $damagePoints - $resultD8);
      } else {
        echo 'Защита не удалась';
      }

      return $damagePoints;
  }

  public function splash(array $players) : void
  {
    $cubeD12 = new CubeD12();
    $damage = $cubeD12 -> cubeD12R();

    foreach ($players as $player){
      if($player -> getTeam() === $this -> getTeam()) {
        continue;
      }
      $player -> damage($damage);
    }
  }
}
