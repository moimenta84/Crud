<?php
declare(strict_types=1);

// Arranca el sistema de la aplicación
require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

use App\Core\Request;
use App\Http\Controllers\Api\ProductoController;

try {

    // Se captura la petición, incluyendo datos enviados por POST
    $request = new Request();

    // Llama al controlador para crear un nuevo producto
    (new ProductoController())->store($request);

} catch (Throwable $e) {

    // Devuelve error 500 
    json(['trace'   => $e->getTraceAsString()], 500);
}
