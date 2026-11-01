<?php

require_once "Player.php";

$P1 = new Player("Artem");
$P2 = new Player("Polina");

$P1 -> damage(50) -> heal(20);
$P2 -> damage(130);

echo $P1 -> info() . '<br />';
echo $P2 -> info() . '<br />';
echo Player::getCount();