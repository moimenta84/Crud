<h1>Ficha de producto</h1>
<p><b>Nombre: </b><?= $producto->nombre ?></p>
<p><b>Precio: </b><?= $producto->precio ?></p>
<p><b>Stock: </b><?= $producto->stock ?></p>
<p><b>Categoría: </b><?= $producto->categoria->nombre_categoria ?></p>
<a href="index.php">Volver</a>