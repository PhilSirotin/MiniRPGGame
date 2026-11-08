<?php

use MiniRPG\Characters\Knight;
use MiniRPG\Characters\Player;
use MiniRPG\Characters\Wizard;
use MiniRPG\Characters\Archer;

require_once __DIR__ . '/vendor/autoload.php';

$wizard = new Wizard('Merlin', 'Blue');
$P1 = new Player('Polina', 190, 'Red');
$P2 = new Player('Andrew', 190, 'Blue');
$P3 = new Player('Murey', 190, 'Red');
$knight = new Knight('Robin Good', 'Red');
$archer = new Archer('Danil Losev', 'Blue');

// $wizard -> splash([$wizard, $P1, $P2, $P3, $knight]);
$archer -> multiAttack($P3);

echo $wizard -> info() . '<br />';
echo $P1 -> info() . '<br />';
echo $P2 -> info() . '<br />';
echo $P3 -> info() . '<br />';
echo $knight -> info() . '<br />';
echo $archer -> info() . '<br />';