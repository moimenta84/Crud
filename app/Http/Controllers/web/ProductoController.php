<?php

declare(strict_types=1);

namespace App\Http\Controllers\web;

use App\Core\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController
{
    public function index(Request $request)
    {
        $nombre = $request->query('nombre', '');
        $categoria_id = $request->query('categoria_id', '');

        $productos = Producto::query()
            ->when($nombre, fn($q) => $q->where('nombre', 'LIKE', "%$nombre%"))
            ->when($categoria_id, fn($q) => $q->where('categoria_id', $categoria_id))
            ->orderBy('precio')
            ->paginate(5);

        $categorias = Categoria::all();

        view('productos/index', compact(
            'productos',
            'categorias',
            'nombre',
            'categoria_id'
        ));
    }

    public function show(int $id): void
    {
        $producto = Producto::find($id)
            ?? throw new \Exception('Producto no encontrado');

        view('productos/show', compact('producto'));
    }

    public function create(): void
    {
        $categorias = Categoria::all();
        view('productos/create', compact('categorias'));
    }

    public function store(Request $request): void
    {
        Producto::create($request->input());
        redirect('/productos/index.php');
    }

    public function edit(int $id): void
    {
        $producto = Producto::find($id)
            ?? throw new \Exception('Producto no encontrado');

        $categorias = Categoria::all();

        view('productos/edit', compact('producto', 'categorias'));
    }

    public function update(int $id, Request $request): void
    {
        $producto = Producto::find($id)
            ?? throw new \Exception('Producto no encontrado');

        $producto->fill($request->input());
        $producto->save();

        redirect('/productos/index.php');
    }

    public function destroy(int $id): void
    {
        $producto = Producto::find($id)
            ?? throw new \Exception('Producto no encontrado');

        $producto->delete();
        
        redirect('/productos/index.php');
    }
}
