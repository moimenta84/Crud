<?php

declare(strict_types=1);

// Carga la configuración, helpers y autoload
require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

use App\Core\Request;
use App\Http\Controllers\Api\ProductoController;

try {

    // Se crea la petición para leer filtros del query string (GET)
    $request = new Request();

    // Acción del controlador que devuelve la lista paginada
    (new ProductoController())->index($request);
} catch (Throwable $e) {

    // Si algo falla, se devuelve un error en formato JSON
    json(['trace'   => $e->getTraceAsString() ], 500);
}
