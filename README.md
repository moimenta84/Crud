# Práctica 5.8 – Controladores

💡 **Nota:** Puedes ver este README con formateado usando **Ctrl + Shift + V** en VS Code (Vista previa de Markdown).

En esta práctica vamos a centralizar en un único archivo Controller toda la lógica relacionada con cada recurso. Por ejemplo, las operaciones sobre productos se agruparán en ProductoController.

⚠️ **IMPORTANTE:** En esta práctica, la constante `BASE_URL` debe apuntar **exactamente al subdirectorio `/public/web`**, ya que ahora los scripts públicos están organizados dentro de esa carpeta.

Ejemplo:

```php
define('BASE_URL', '/2526_servidor/php/2526_practicas/p5_8/public/web');
```

Si `BASE_URL` apunta solo a `/public`, dejarán de funcionar todas las rutas que dependan de dicha constante (por ejemplo, **los enlaces con URL absoluta**, como la hoja de estilos de la aplicación, o las redirecciones generadas con `redirect()`).
