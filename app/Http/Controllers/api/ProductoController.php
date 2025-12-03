<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Core\Request;
use App\Models\Producto;

class ProductoController
{
    /**
     * GET /api/productos
     * Listado con filtros y paginación
     */
    public function index(Request $request): void
    {
        $nombre = $request->query('nombre', '');
        $categoria_id = $request->query('categoria_id', '');

        $productos = Producto::query()
            ->when($nombre, fn($q) => $q->where('nombre', 'LIKE', "%$nombre%"))
            ->when($categoria_id, fn($q) => $q->where('categoria_id', $categoria_id))
            ->orderBy('precio')
            ->paginate(5);

        json($productos, 200);
    }

    /**
     * GET /api/productos/show.php?id=1
     * Obtener un producto por ID
     */
    public function show(int $id): void
    {
        if ($id <= 0) {
            throw new Exception("Identificador no válido.");
        }

        $producto = Producto::find($id)
            ?? throw new Exception("Producto no encontrado.");

        json($producto, 200);
    }

    /**
     * POST /api/productos/store.php
     * Crear producto vía JSON (POST)
     */
    public function store(Request $request): void
    {
        $data = $request->post();

        // hydrate() crea un nuevo modelo desde un array
        $producto = Producto::hydrate($data);
        $producto->save();

        json($producto, 201); // 201 → Created
    }

    /**
     * POST /api/productos/update.php?id=1
     * Actualizar un producto
     */
    public function update(int $id, Request $request): void
    {
        $producto = Producto::find($id)
            ?? throw new Exception("Producto no encontrado.");

        // fill() actualiza propiedades del modelo
        $producto->fill($request->post());
        $producto->save();

        json($producto, 200);
    }

    /**
     * POST /api/productos/destroy.php?id=1
     * Eliminar un producto
     */
    public function destroy(int $id): void
    {
        $producto = Producto::find($id)
            ?? throw new Exception("Producto no encontrado.");

        $producto->delete();

        json(null, 204);
    }
}
