<?php

declare(strict_types=1);

require_once __DIR__ . '/../app/Core/helpers/helper.php';
require_once __DIR__ . '/../config/config.php';

// Autoloader universal
spl_autoload_register(function ($class) {

    // Convierte App\X\Y a app/X/Y.php
    $path = __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';

    // Ajusta primera letra en minúscula
    $path = lcfirst($path);

    if (file_exists($path)) {
        require_once $path;
    }
});
