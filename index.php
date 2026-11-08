<?php

use MiniRPG\Characters\Knight;
use MiniRPG\Characters\Player;
use MiniRPG\Characters\Wizard;

require_once __DIR__ . '/vendor/autoload.php';

$wizard = new Wizard('Merlin', 'Blue');
$P1 = new Player('Polina', 190, 'Red');
$P2 = new Player('Andrew', 190, 'Blue');
$P3 = new Player('Murey', 190, 'Red');
$knight = new Knight('Robin Good', 'Red');

$wizard -> splash([$wizard, $P1, $P2, $P3, $knight]);

echo $wizard -> info() . '<br />';
echo $P1 -> info() . '<br />';
echo $P2 -> info() . '<br />';
echo $P3 -> info() . '<br />';
echo $knight -> info() . '<br />';

