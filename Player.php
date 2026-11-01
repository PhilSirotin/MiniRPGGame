<?php

require_once 'cubeD4.php';
require_once 'cubeD6.php';
require_once 'cubeD8.php';
require_once 'cubeD10.php';
require_once 'cubeD12.php';
require_once 'cubeD20.php';
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
  private float $cubeD100; // Куб 100
  private int $maxScore; // Максимальное очко

  public function __construct(string $name)
  {
    $this -> name = $name;
    $this -> health = self::MAX_HEALTH;
    self::$count++;
  }

  public function damage($points) : object
  {
    $this -> health = $this -> health - $points;

    if ($this -> health < 0) {
      $this -> health = 0;
    }
    return $this;
  }

  public function heal(int $points) : object | int
  {
    


    $this -> health = $this -> health + $points;
    
    if ($this -> health > self::MAX_HEALTH)
      {
        $this -> health = self::MAX_HEALTH;
      }
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




// class Player 
// {
//   public const MAX_HEALTH = 100;

//   public static $count = 0;

//   private string $name;
//   private float $health;
//   private int $cubeD4; // Куб с 4 гранями 
//   private int $cubeD6; // Куб с 6 гранями
//   private int $cubeD8; // Куб с 8 гранями
//   private int $cubeD10; // Куб с 10 гранями
//   private int $cubeD12; // Куб с 12 гранями
//   private int $cubeD20; // Куб с 20 гранями
//   private float $cubeD100; // Куб 100
//   private int $maxScore; // Максимальное очко

//   public function __construct(string $name)
//   {
//     $this -> name = $name;
//     $this -> health = self::MAX_HEALTH;
//     self::$count++;
//   }


//   public function cubeD4R() : int 
//   {
//     return $this -> cubeD4 = random_int(1,4);
//   }

//   public function cubeD6R() : int
//   {
//     return $this -> cubeD6 = random_int(1,6);
//   }

//   public function cubeD8R() : int
//   {
//     return $this -> cubeD8 = random_int(1,8);
//   }

//   public function cube10R() : int
//   {
//     return $this -> cubeD8 = random_int(1,10);
//   }

//   public function cube12R() : int
//   {
//     return $this -> cubeD12 = random_int(1,12);
//   }

//   public function cube20R() : int
//   {
//     return $this -> cubeD20 = random_int(1,20);
//   }

//   public function damage($points) : object
//   {
//     $this -> health = $this -> health - $points;

//     if ($this -> health < 0) {
//       $this -> health = 0;
//     }
//     return $this;
//   }

//   public function heal(int $points) : object | int
//   {
//     $this -> maxScore = random_int(1,6);
//     if($this -> cubeD6R() === $this -> maxScore){
//       $this -> 

//     $this -> health = $this -> health + $points;
//     }
//     if ($this -> health > self::MAX_HEALTH)
//       {
//         $this -> health = self::MAX_HEALTH;
//       }
//       return $this;
//   }

//   public static function getCount()
//   {
//     return self::$count;
//   }

//   public function info() 
//   {
//       return $this->name . ": " . $this->health . "/" . self::MAX_HEALTH;
//   }

 
// }
