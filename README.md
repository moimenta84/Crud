# CRUD Productos → Categoría

## Mini Framework Casero

Este documento explica cómo implementar un **CRUD completo de Productos**, incluyendo su relación con **Categorías** usando el mini-framework desarrollado en las prácticas:

- **DB** – conexión y ejecución SQL
- **Model** – Active Record Base
- **QueryBuilder** – construcción fluida de consultas
- **Request** – gestión unificada de GET + POST
- **Controladores** en `/app/Http/Controllers/`
- **Vistas con layout** en `/resources/views/`
- **Scripts públicos** dentro de `/public/web`

El sistema implementa:

- Un CRUD completo de **Productos**
- Cada Producto pertenece a **una Categoría** (`categoria_id`)
- Una Categoría puede tener **varios Productos** (relación 1:N)

---

## 📁 Estructura del Proyecto

```txt
app/
 ├── Core/
 │    ├── DB.php
 │    ├── Model.php
 │    ├── QueryBuilder.php
 │    ├── Request.php
 │    └── helpers/
 │         └── helper.php
 ├── Models/
 │    ├── Categoria.php
 │    └── Producto.php
 └── Http/
      └── Controllers/
           ├── ProductoController.php
           └── CategoriaController.php   (solo para obtener categorías)

public/
 └── web/
      └── productos/
           ├── index.php
           ├── show.php
           ├── create.php
           ├── store.php
           ├── edit.php
           ├── update.php
           └── destroy.php

resources/
 └── views/
       ├── layouts/app.php
       └── productos/
            ├── index.php
            ├── show.php
            ├── create.php
            ├── edit.php
            └── _form.php
```
