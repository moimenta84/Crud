<?php

declare(strict_types=1);

namespace App\Models;

require_once __DIR__ . '/../Core/Model.php';
require_once __DIR__ . '/../Core/QueryBuilder.php';

use App\Core\Model;
use App\Core\QueryBuilder;

class Categoria extends Model
{
    // NOMBRE REAL DE LA TABLA
    protected static string $table = 'categorias';

    // PRIMARY KEY CORRECTA
    protected static string $primaryKey = 'categoria_id';

    // COLUMNAS QUE EXISTEN EN LA TABLA
    protected static array $columns = [
        'categoria_id',
        'nombre_categoria'
    ];

    // Relación 1:N → una categoría tiene muchos productos
    public function productos(): QueryBuilder
    {
        return Producto::where('categoria_id', $this->{static::$primaryKey});
    }
}
