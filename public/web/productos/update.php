<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

use App\Core\Request;
use App\Http\Controllers\web\ProductoController;

try {
    $request = new Request();
    $id = (int) $request->query('id', 0);   // ← ESTO ES LO CORRECTO

    (new ProductoController())->update($id, $request);
} catch (Throwable $e) {

    echo $e->getMessage() . "<br>" . $e->getTraceAsString();
}
