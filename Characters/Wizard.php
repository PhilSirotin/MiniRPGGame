<?php

require_once "Cube/cubeD8.php";
require_once "MiniRPGGame/Player.php";

class Wizard extends Player
{
  public function __construct(string $name, int $maxHealth, string $team)
  {
    parent::__construct($name, 130, $team );
  }

  public function defense(int $damagePoints)
  {
    $cubeD8 = new cubeD8();
    $resultD8 = $cubeD8 -> cubeD8R();

    if($resultD8 > 3) 
      {
        $damagePoints = max(0, $damagePoints - $resultD8);
      } else {
        echo 'Защита не удалась';
      }

      return $damagePoints;
  }

  public function splash($target, int $damagePoints)
  {
    return $target -> damage($damagePoints);
  }
}