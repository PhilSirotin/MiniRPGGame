<?php

namespace MiniRPG\Cube;

class CubeD12
{
  private int $cubeD12;

  public function cubeD12R() : int
  {
    return $this -> cubeD12 = random_int(1,12);
  }
}
