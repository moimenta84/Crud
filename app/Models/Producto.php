<?php

declare(strict_types=1);

namespace App\Models;

require_once __DIR__ . '/../Core/Model.php';

use App\Core\Model;
use App\Core\QueryBuilder;

class Producto extends Model
{
    protected static string $table = 'productos';

    // PRIMARY KEY CORRECTA
    protected static string $primaryKey = 'producto_id';

    // COLUMNAS CORRECTAS PARA INSERTAR/ACTUALIZAR
    protected static array $columns = [
        'producto_id',   //
        'nombre',
        'precio',
        'stock',
        'categoria_id'
    ];

    public function categoria(): Categoria
    {
        return Categoria::find($this->categoria_id);
    }

    public function ventaProductos(): QueryBuilder
    {
        return VentaProducto::where('producto_id', $this->{static::$primaryKey});
    }
}
