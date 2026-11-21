<?php

namespace App\Characters;
use App\Cube\CubeD4;
use App\Cube\CubeD6;
use App\Cube\CubeD10;
use App\Cube\CubeD20;

class Player
{
  private string $name;
  private int $maxHealth;
  private float $flawa;
  private CONST MAX_FLAWA = 10;
  private string $team;
  private int $health;
  private int $maxScore;
  private static int $count = 0;


  public function __construct(string $name, int $maxHealth, float $flawa, string $team)
  {
    $this -> name = $name;
    $this -> maxHealth = $maxHealth;
    $this -> flawa = 3;
    $this -> team = $team;
    $this -> maxScore = random_int(1,15);
    $this -> health = $maxHealth;
    self::$count++;
  }

//Attack
  public function checkTeam(Player $target) : bool
  {
    if ($this -> getTeam() === $target -> getTeam()){
      echo 'Атака по своим запрещена!' . '<br />';
      return false;
    }

    return true;
  }

  public function attack(Player $target): mixed
  {
    if (!$this -> checkTeam($target)) {
      return $this;
    }

    $damagePoints = 0;

    $cubeD6_1 = new CubeD6() -> cubeD6R();
    $cubeD6_2 = new CubeD6() -> cubeD6R();

    if($cubeD6_1 == $cubeD6_2){
      $damagePoints = new CubeD20() -> cubeD20R();
    } elseif ($cubeD6_1 > $cubeD6_2){
      $cubeD20 = new CubeD20();
      $damagePoints = max(0, $cubeD20 -> cubeD20R() - $cubeD6_2);
    } else {
      echo 'Miss' . '<br />';
      return $this;
    }

    $target -> damage($damagePoints);
    return $this;
  }

  public function damage(int $points)
  {
    $points = $this -> defense($points);

    $this -> health = $this -> health - $points;
    if ($this -> health < 0){
      $this -> health = 0;
    }

    return $this;
  }

  // defense
  public function defense(int $damagePoints): mixed
  {
    $cubeD10 = new CubeD10() -> cubeD10R();

    if ($cubeD10 >= $this -> maxScore) {
      $defenseD6 = new CubeD6() -> cubeD6R();
      $damagePoints = max(0, $damagePoints - $defenseD6);
    } else {
      echo 'Защита не удалась!';
    }

    return $damagePoints;
  }

  //heal
  public function calculateHealPoints(): int
  {
    $cubeD6 = new CubeD6() -> cubeD6R();

    if ($cubeD6 % 2 === 0) {
      $cubeD4_1 = new CubeD4() -> cubeD4R();
      $cubeD4_2 = new CubeD4() -> cubeD4R();

      $healPoints = $cubeD4_1 + $cubeD4_2;
    } else {
      $cubeD4 = new CubeD4() -> cubeD4R();
      $healPoints = $cubeD4;
    }

    return $healPoints;
  }

  public function heal(int $points): self
  {
    $this -> health = min(
    $this -> maxHealth,
    $this -> health + max(0, $points)
    );

    return $this;
  }

  //flawa
  public function spendFlawa($cost) : bool
  {
    if ($this -> flawa < 0 || $this -> flawa < $cost){
      return false;
    }

    $this -> flawa -= $cost;

    return true;
  }

  //Live or dead
  public function isAlive(): string
  {
    if ($this -> health > 0) {
      return 'Player alive' . '<br />';
    } else {
      return 'Player dead' . '<br />';
    }
  }

  //info
  public function info(): mixed
  {
    return $this -> name . ": " . $this -> health . "/" . $this -> maxHealth;
  }

  //getter
  public  function getTeam(): string
  {
    return $this -> team;
  }

  public static function getCount()
  {
    return self::$count;
  }

  public function getName(): string
  {
    return $this -> name;
  }

  public function getHealth(): int
  {
    return $this -> health;
  }

  public function getMaxHealth(): int
  {
    return $this -> maxHealth;
  }
}
