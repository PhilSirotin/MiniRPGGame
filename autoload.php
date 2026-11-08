<?php

spl_autoload_register(static function (string $class): void {
    $classFiles = [
        'Player' => __DIR__ . '/Characters/Player.php',
        'Wizard' => __DIR__ . '/Characters/Wizard.php',
        'Knight' => __DIR__ . '/Characters/Knight.php',
        'cubeD4' => __DIR__ . '/Cube/cubeD4.php',
        'cubeD6' => __DIR__ . '/Cube/cubeD6.php',
        'cubeD8' => __DIR__ . '/Cube/cubeD8.php',
        'cubeD10' => __DIR__ . '/Cube/cubeD10.php',
        'cubeD12' => __DIR__ . '/Cube/cubeD12.php',
        'cubeD20' => __DIR__ . '/Cube/cubeD20.php',
    ];

    if (isset($classFiles[$class])) {
        require_once $classFiles[$class];
    }
});
