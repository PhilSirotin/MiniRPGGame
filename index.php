<?php

require_once "Player.php";
require_once "Characters/Wizard.php";

$P1 = new Player('Artem', 100, 'Blue');
$P2 = new Player('Katya', 140, 'Red');
$P3 = new Player('Polina', 140, 'Blue');

$P1 -> attack($P2);
$P3 -> attack($P1);
$P2 -> splash('Blue');
// $P1 -> heal();

echo $P1 -> isAlive();
echo $P1 -> info() . '<br />';
echo $P2 -> info() . '<br />';

// echo Player::getCount();