<?php
declare(strict_types=1);

// Carga la configuración común y el autoload de clases
require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

use App\Core\Request;
use App\Http\Controllers\web\ProductoController;

try {
    // Se crea el objeto Request para poder leer parámetros GET/POST
    $request = new Request();

    // Se recoge el id del producto a eliminar (por defecto 0 si no viene)
    $id = (int) $request->input('id', 0);

    // Se llama al método del controlador encargado de borrar el registro
    (new ProductoController())->destroy($id);

} catch (Throwable $e) {
    // Si ocurre cualquier error, se muestra un mensaje y el rastro del error
    echo $e->getMessage() . "<br>" . $e->getTraceAsString();
}
