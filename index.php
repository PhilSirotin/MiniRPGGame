<?php

require_once __DIR__ . '/Player.php';
require_once __DIR__ . '/Characters/Wizard.php';

$wizard = new Wizard('Merlin', 'Blue');
$P1 = new Player('Polina', 130, 'Red');
$P2 = new Player('Andrew', 190, 'Blue');
$P3 = new Player('Murey', 180, 'Red');

$wizard -> splash([$wizard, $P1, $P2, $P3]);

echo $wizard -> info() . '<br />';
echo $P1 -> info() . '<br />';
echo $P2 -> info() . '<br />';
echo $P3 -> info() . '<br />';

