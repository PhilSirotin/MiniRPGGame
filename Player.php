<?php

require_once 'Cube/cubeD4.php';
require_once 'Cube/cubeD6.php';
require_once 'Cube/cubeD8.php';
require_once 'Cube/cubeD10.php';
require_once 'Cube/cubeD12.php';
require_once 'Cube/cubeD20.php';
// Сделать шар из 25 граней.
// Дописать heal().
// Добавить MIN_HEALTH и метод isAlive().


// Добавить свойства $attack и $defense.
// Метод attack(Player $target): бьёт другого игрока с учётом защиты и случайного разброса (random_int).
// Консольный цикл боя: игроки бьют по очереди, пока кто-то не умрёт.

// Удалить объект unset()

class Player 
{
  public const MAX_HEALTH = 100;

  public static $count = 0;

  private string $name;
  private float $health;
  private int $maxScore; 

  public function __construct(string $name)
  {
    $this -> name = $name;
    $this -> health = self::MAX_HEALTH;
    self::$count++;
  }

  public function damage() {
    $cubeD6_1 = new cubeD6();
    $cubeD6_2 = new CubeD6();

    $resultD6_1 = $cubeD6_1 -> cubeD6R();
    $resultD6_2 = $cubeD6_2 -> cubeD6R();

    switch(true) {
      case ($resultD6_1 == $resultD6_2):
        $cubeD20 = new cubeD20();
        $resultD20 = $cubeD20 -> cubeD20R();
        $this -> health = $this -> health - $resultD20;
        unset($cubeD20);
        break;
      case ($resultD6_1 > $resultD6_2):
        $cubeD20 = new cubeD20();
        $resultD20 = $cubeD20 -> cubeD20R();
        $resultD20 -= $resultD6_2;
        $this -> health = $this -> health - $resultD20;
        unset($cubeD20);
        break;
      case($resultD6_1 < $resultD6_2):
        echo 'Промах' . '<br />';
        break;
      };
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

    $this->health = min(
        self::MAX_HEALTH,
        $this->health + $healPoints
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
      return $this->name . ": " . $this->health . "/" . self::MAX_HEALTH;
  }

 
}