<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="panel-box" style="max-width: 500px; margin: 2rem auto;">
    <div class="seccion-titulo">
        <h3>Editar Producto</h3>
        <p>Modifica los detalles de la prenda</p>
    </div>

    <form action="/Moon_essence/public/index.php?action=actualizar-producto" method="POST">
        <input type="hidden" name="id" value="<?= $producto['id'] ?>">

        <div class="form-group">
            <label>Nombre de la prenda</label>
            <input type="text" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
            <div class="form-group">
                <label>Precio (COP)</label>
                <input type="number" name="precio" value="<?= $producto['precio'] ?>" required>
            </div>
            <div class="form-group">
                <label>Stock</label>
                <input type="number" name="stock" value="<?= $producto['stock'] ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label>Ruta de la Imagen</label>
            <input type="text" name="imagen_url" value="<?= htmlspecialchars($producto['imagen_bg'] ?? '') ?>">
        </div>

        <button type="submit" class="btn-add-carrito btn-exito">Guardar Cambios</button>
        <a href="/Moon_essence/public/index.php" style="display: block; text-align: center; margin-top: 1rem; color: var(--texto-mutado);">Cancelar</a>
    </form>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>