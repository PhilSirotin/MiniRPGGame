<?php

require_once "Player.php";

$P1 = new Player("Artem");
$P2 = new Player("Polina");

echo $P1 -> info() . '<br />';
echo $P2 -> info() . '<br />';

$P1 -> damage(20);
$P1 -> heal(20);

// echo Player::getCount();