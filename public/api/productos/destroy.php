<?php

declare(strict_types=1);

// Cargar helpers, config y autoload
require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

use App\Core\Request;
use App\Http\Controllers\Api\ProductoController;

try {

    // Request para leer parámetros
    $request = new Request();

    // El ID del producto a eliminar llega por GET
    $id = (int) $request->query('id', 0);

    // Se ejecuta la eliminación del producto
    (new ProductoController())->destroy($id);
} catch (Throwable $e) {

    // Respuesta JSON con error interno (500)
    json([ 'trace'   => $e->getTraceAsString() ], 500);
}
