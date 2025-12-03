<form method="POST" action="<?= $action ?>" class="form-vertical">

    <input type="hidden" name="id" value="<?= $producto->id ?? '' ?>">

    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input
            type="text" id="nombre" name="nombre"
            value="<?= e($producto->nombre ?? '') ?>"
        >
    </div>

    <div class="form-group">
        <label for="precio">Precio:</label>
        <input
            type="number" id="precio" name="precio" step="0.01"
            value="<?= e($producto->precio ?? '') ?>"
        >
    </div>

    <div class="form-group">
        <label for="stock">Stock:</label>
        <input
            type="number" id="stock" name="stock"
            value="<?= e($producto->stock ?? '') ?>"
        >
    </div>

    <div class="form-group">
        <label for="categoria_id">Categoría:</label>
        <select id="categoria_id" name="categoria_id">
            <?php foreach($categorias as $categoria): ?>
                <option value="<?= e($categoria->id_categoria) ?>"
                    <?= ($producto->categoria_id ?? '') == $categoria->id_categoria ? "selected" : '' ?>>
                    <?= e($categoria->nombre_categoria) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-actions">
        <button type="submit">
            Guardar producto
        </button>
    </div>

</form>
