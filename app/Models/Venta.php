<?php

declare(strict_types=1);

namespace App\Models;

require_once __DIR__ . '/../Core/Model.php';

use App\Core\Model;
use App\Core\QueryBuilder;

class Venta extends Model
{
    protected static string $table = 'ventas';
    protected static string $primaryKey = 'id_venta';
    protected static array $columns = ['id_venta', 'total'];

    // app/Models/Venta.php
    public function ventaProductos(): QueryBuilder
    {
        return VentaProducto::where('venta_id', $this->{static::$primaryKey});
    }
}
