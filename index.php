<?php

require_once "Player.php";

$P1 = new Player("Artem");
$P2 = new Player("Polina");

$P1 -> damage(20);
$P1 -> heal();


echo $P1 -> info() . '<br />';
echo $P2 -> info() . '<br />';

// echo Player::getCount();