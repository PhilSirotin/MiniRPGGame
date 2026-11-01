<?php

class cubeD20
{
  private int $cubeD20;

  public function cubeD20R() : int
  {
    return $this -> cubeD20 = random_int(1,20);
  }
}