<?php
// Добавить после реализации ходовки, лучнику атаку ядовитой стрелой, которая будет рандомно кидать кубик, который показывает на сколько ходов и после каждого хода отнимать у врага здоровье
namespace MiniRPG\Characters;

class Archer extends Player
{
    public function __construct(string $name, string $team)
    {
        parent::__construct($name, 190, $team);
    }

    public function multiAttack(Player $target): self
    {
        if ($this->getTeam() === $target->getTeam()) {
            echo 'Огонь по своим запрещен<br />';
            return $this;
        }

        for ($arrow = 1; $arrow <= 3; $arrow++) {
            if ($target->getHealth() <= 0) {
                break;
            }

            parent::attack($target);
        }

        return $this;
    }
}
