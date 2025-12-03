<?php

declare(strict_types=1);

// Cargar sistema común (autoload y helpers)
require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

use App\Core\Request;
use App\Http\Controllers\Api\ProductoController;

try {

    // Se obtiene la petición
    $request = new Request();

    // El ID viene por GET (?id=1)
    $id = (int) $request->query('id', 0);

    // Se llama al método que devuelve un producto en JSON
    (new ProductoController())->show($id);
} catch (Throwable $e) {

    // Error interno  JSON con código 500
    json(['trace'   => $e->getTraceAsString() ], 500);
}
