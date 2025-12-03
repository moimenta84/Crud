<?php

declare(strict_types=1);

// Inicializa helpers, autoload, config…
require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

use App\Core\Request;
use App\Http\Controllers\Api\ProductoController;

try {

  
    $request = new Request();

    // El ID del producto
    $id = (int) $request->query('id', 0);

    // Actualiza el producto y devuelve el resultado en JSON
    (new ProductoController())->update($id, $request);
} catch (Throwable $e) {

    // Error 500 con mensaje y traza de depuración
    json(['trace'   => $e->getTraceAsString() ], 500);
}
