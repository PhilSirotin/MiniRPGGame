<?php

namespace MiniRPG\Cube;

class CubeD4
{
  private int $cubeD4;

  public function cubeD4R() : int
  {
    return $this -> cubeD4 = random_int(1,4);
  }
}
