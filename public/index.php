<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Characters\Archer;
use App\Characters\Healer;
use App\Characters\Knight;
use App\Characters\Wizard;

echo '<h1>Тест RPG-проекта</h1>';

try {
    $archer = new Archer('Арчер', 5.0, 'red');
    $knight = new Knight('Рыцарь', 5.0, 'blue');
    $healer = new Healer('Целитель', 5.0, 'red');
    $wizard = new Wizard('Маг', 5.0, 'blue');

    $players = [$archer, $knight, $healer, $wizard];

    echo '<h2>Персонажи</h2>';
    foreach ($players as $player) {
        echo $player->info() . '<br>';
    }

    echo '<h2>Атака арчера</h2>';
    $archer->attack($knight);
    echo $knight->info() . '<br>';

    echo '<h2>Тройная атака арчера</h2>';
    $archer->multiAttack($knight);
    echo $knight->info() . '<br>';

    echo '<h2>Лечение союзника</h2>';
    $healer->healAlly($archer);
    echo $archer->info() . '<br>';

    echo '<h2>Массовое лечение</h2>';
    $healer->teamHeal($players);
    foreach ($players as $player) {
        echo $player->info() . '<br>';
    }

    echo '<h2>Магическая атака</h2>';
    $wizard->splash($players);
    foreach ($players as $player) {
        echo $player->info() . '<br>';
    }
} catch (Throwable $error) {
    echo '<h2>Ошибка</h2>';
    echo '<pre>' . htmlspecialchars($error->getMessage()) . '</pre>';
}
