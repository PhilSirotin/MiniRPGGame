<?php

namespace MiniRPG\Cube;

class CubeD8
{
  private int $cubeD8;

  public function cubeD8R() : int
  {
    return $this -> cubeD8 = random_int(1,8);
  }
}
