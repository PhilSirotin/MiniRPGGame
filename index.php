<?php

require_once "Player.php";

$P1 = new Player('Artem', 100, 'Blue');
$P2 = new Player('Katya', 140, 'Blue');
$P3 = new Player('Polina', 140, 'Red');

$P1 -> attack($P2);
$P3 -> attack($P1);
// $P1 -> heal();

echo $P1 -> isAlive();
echo $P1 -> info() . '<br />';
echo $P2 -> info() . '<br />';

// echo Player::getCount();