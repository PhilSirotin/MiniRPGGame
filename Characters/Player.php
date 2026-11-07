<?php

require_once 'Cube/cubeD4.php';
require_once 'Cube/cubeD6.php';
require_once 'Cube/cubeD8.php';
require_once 'Cube/cubeD10.php';
require_once 'Cube/cubeD12.php';
require_once 'Cube/cubeD20.php';

class Player 
{

  public static $count = 0;

  private int $maxHealth;
  private string $name;
  private float $health;
  private int $maxScore; 
  private string $team;

  public function __construct(string $name, int $maxHealth, string $team)
  {
    $this -> name = $name;
    $this -> maxHealth = $maxHealth;
    $this -> health = $maxHealth;
    $this -> maxScore = random_int(1,15);
    $this -> team = $team;
    self::$count++;
  }

  public function attack(Player $target)
{
  if ($this -> getTeam() == $target -> getTeam())
    {
      echo 'Огонь по своим запрещен' . '<br />';
      return $this;
    }
    $damagePoints = 0;

    $cubeD6_1 = new CubeD6();
    $cubeD6_2 = new CubeD6();

    $resultD6_1 = $cubeD6_1 -> cubeD6R();
    $resultD6_2 = $cubeD6_2 -> cubeD6R();


    if ($resultD6_1 == $resultD6_2) {
        $cubeD20 = new CubeD20();
        $damagePoints = $cubeD20 -> cubeD20R();
    } elseif ($resultD6_1 > $resultD6_2) {
        $cubeD20 = new CubeD20();
        $damagePoints = max(0, $cubeD20 -> cubeD20R() - $resultD6_2);
    } else {
        echo 'Промах' . '<br />';
        return $this;
    }

    $target -> damage($damagePoints);
    return $this;
}

public function damage(int $points)
{
    $points = $this -> defense($points);

    $this -> health = $this -> health - $points;
    if ($this -> health < 0) {
        $this -> health = 0;
    }

    return $this;
}

  public function defense(int $damagePoints)
  {
    $cubeD10 = new cubeD10();
    $resultD10 = $cubeD10 -> cubeD10R();
    if ($resultD10 >= $this -> maxScore)
      {
        $defenseD6 = new cubeD6();
        $defenseResult = $defenseD6 -> cubeD6R();
        $damagePoints = max(0,$damagePoints - $defenseResult);
      } else {
        echo 'Защита не удалась';
      }
      return $damagePoints;
  }

  public function heal(): object
{
    $cubeD6 = new cubeD6();
    $successScore = $cubeD6->cubeD6R();

    echo 'Бросок D6 кубика: ' . $successScore . '<br />';

    if ($successScore % 2 === 0) {
        $cubeD4_1 = new cubeD4();
        $cubeD4_2 = new cubeD4();

        $resultD4_1 = $cubeD4_1->cubeD4R();
        $resultD4_2 = $cubeD4_2->cubeD4R();

        echo 'Бросок D4_1 кубика: ' . $resultD4_1 . '<br />';
        echo 'Бросок D4_2 кубика: ' . $resultD4_2 . '<br />';

        $healPoints = $resultD4_1 + $resultD4_2;
    } else {
        $cubeD4 = new cubeD4();
        $healPoints = $cubeD4->cubeD4R();

        echo 'Бросок D4 кубика: ' . $healPoints . '<br />';
    }

    $this -> health = min(
        $this -> maxHealth,
        $this -> health + $healPoints
    );

    echo 'Восстановлено здоровья: ' . $healPoints . '<br />';

    return $this;
}


  public static function getCount()
  {
    return self::$count;
  }

  public function info() 
  {
      return $this->name . ": " . $this->health . "/" . $this -> maxHealth;
  }

  public function isAlive()
  {
    if ($this -> health > 0) {
      return 'Игрок жив' . '<br />';
    } else {
      return 'Игрок мертв' . '<br />';
    }
  }
 

  public function getName() : string
  {
    return $this -> name;
  }

  public function getHealth() : int
  {
    return $this -> health;
  }

  public function getMaxHealth() : int
  {
    return $this -> maxHealth;
  }

  public function getTeam() : string
  {
    return $this -> team;
  }
}