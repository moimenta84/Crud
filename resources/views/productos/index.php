<h1>Listado de productos</h1>

<!-- Filtros -->
<form method="get" style="margin-bottom: 20px;">
    <label>
        Nombre:
        <input type="text" name="nombre" value="<?= e($nombre) ?>">
    </label>

    <label>
        Categoría:
        <select name="categoria_id">
            <option value="">-- Todas --</option>
            <?php foreach ($categorias as $categoria): ?>
                <option
                    value="<?= e($categoria->categoria_id) ?>"
                    <?= ($categoria->$categoria_id == $categoria_id) ? 'selected' : '' ?>>
                    <?= e($categoria->nombre_categoria) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>

    <button type="submit">Filtrar</button>
    <a href="index.php">Limpiar</a>
</form>

<p>
    <a href="create.php">Crear producto</a>
</p>

<table border="1" cellpadding="2" cellspacing="0">
    <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio (€)</th>
        <th>Stock (ud)</th>
        <th>Categoría</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td class="text-right"><?= e($producto->id) ?></td>
                <td><?= e($producto->nombre) ?></td>
                <td class="text-right"><?= e($producto->precio) ?></td>
                <td class="text-right"><?= e($producto->stock) ?></td>
                <td><?= e($producto->categoria->nombre_categoria) ?></td>

                <td>
                    <a href="show.php?id=<?= e($producto->id) ?>">Ver</a> |
                    <a href="edit.php?id=<?= e($producto->id) ?>">Editar</a> |

                    <form action="destroy.php" method="post" style="display:inline">
                        <input type="hidden" name="id" value="<?= e($producto->id) ?>">
                        <button type="submit" onclick="return confirm('¿Eliminar este producto?')">
                            Eliminar
                        </button>
                    </form>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div style="margin-top: 20px;">
    <?= $productos->links(); ?>
</div>