<?php

namespace MiniRPG\Cube;

class CubeD10
{
  private int $cubeD10;

  public function cubeD10R() : int
  {
    return $this -> cubeD10 = random_int(1,10);
  }
}
