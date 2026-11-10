<?php

namespace MiniRPG\Characters;

use MiniRPG\Cube\CubeD4;
use MiniRPG\Cube\CubeD6;
use MiniRPG\Cube\CubeD10;
use MiniRPG\Cube\CubeD20;

class Player
{
    public static $count = 0;

    private int $maxHealth;
    private string $name;
    private int $health;
    private int $maxScore;
    private string $team;
    private float $flawa;

    public function __construct(string $name, int $maxHealth, string $team, float $flawa)
    {
        $this -> name = $name;
        $this -> maxHealth = $maxHealth;
        $this -> health = $maxHealth;
        $this -> maxScore = random_int(1, 15);
        $this -> team = $team;
        $this -> flawa = $flawa;
        self::$count++;
    }

    public function attack(Player $target): Player
    {
        if ($this -> getTeam() == $target -> getTeam()) {
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

    public function damage(int $points): Player
    {
        $points = $this -> defense($points);

        $this -> health = $this -> health - $points;
        if ($this -> health < 0) {
            $this -> health = 0;
        }

        return $this;
    }

    public function defense(int $damagePoints): mixed
    {
        $cubeD10 = new CubeD10();
        $resultD10 = $cubeD10 -> cubeD10R();
        if ($resultD10 >= $this -> maxScore) {
            $defenseD6 = new CubeD6();
            $defenseResult = $defenseD6 -> cubeD6R();
            $damagePoints = max(0, $damagePoints - $defenseResult);
        } else {
            echo 'Защита не удалась';
        }
        return $damagePoints;
    }

    public function heal(): object
    {
        $cubeD6 = new CubeD6();
        $successScore = $cubeD6->cubeD6R();

        echo 'Бросок D6 кубика: ' . $successScore . '<br />';

        if ($successScore % 2 === 0) {
            $cubeD4_1 = new CubeD4();
            $cubeD4_2 = new CubeD4();

            $resultD4_1 = $cubeD4_1->cubeD4R();
            $resultD4_2 = $cubeD4_2->cubeD4R();

            echo 'Бросок D4_1 кубика: ' . $resultD4_1 . '<br />';
            echo 'Бросок D4_2 кубика: ' . $resultD4_2 . '<br />';

            $healPoints = $resultD4_1 + $resultD4_2;
        } else {
            $cubeD4 = new CubeD4();
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

    public function restoreHealth(int $points): self
{
    $this -> health = min(
        $this -> maxHealth,
        $this -> health + max(0, $points)
    );

    return $this;
}

    public function spendFlawa($cost)
    {
        if ($this -> flawa < 0 || $this -> flawa < $cost)
            {
                return false;
            }
        $this -> flawa -= $cost;
        
        return true;
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


    public function getName(): string
    {
        return $this -> name;
    }

    public function getHealth(): int
    {
        return $this -> health;
    }

    public function getMaxHealth(): int
    {
        return $this -> maxHealth;
    }

    public function getTeam(): string
    {
        return $this -> team;
    }
}
