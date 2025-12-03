<?php

declare(strict_types=1);

namespace App\Models;

require_once __DIR__ . '/../Core/Model.php';

use App\Core\Model;
use App\Core\QueryBuilder;

class VentaProducto extends Model
{
    protected static string $table = 'venta_producto';
    protected static string $primaryKey = 'id_venta_producto';
    protected static array $columns = ['id_venta_producto', 'venta_id', 'producto_id', 'cantidad', 'precio_venta'];

    // app/Models/Producto.php
    public function venta(): Venta
    {
        return Venta::find($this->venta_id);
    }

    public function producto(): Producto
    {
        return Producto::find($this->producto_id);
    }
}
