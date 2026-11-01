<?php

class Player 
{
  public const MAX_HEALTH = 100;

  public static $count = 0;

  private string $name;
  private float $health;

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

  public function heal(int $points) : object
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