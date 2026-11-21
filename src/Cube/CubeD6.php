<?php

namespace App\Cube;

class CubeD6
{
  private int $cubeD6;

  public function cubeD6R() : int
  {
    return $this -> cubeD6 = random_int(1,6);
  }
}
