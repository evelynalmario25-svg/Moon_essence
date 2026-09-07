<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="seccion-titulo">
    <h2>Panel de Emprendimiento</h2>
    <p>Gestiona tu catálogo de prendas e inventario en tiempo real.</p>
</div>

<div class="dashboard-split">
    <!-- FORMULARIO CREAR PRODUCTO -->
    <div class="panel-box">
        <h4>Añadir Nuevo Producto al Catálogo</h4>
        <form action="/Moon_essence/public/index.php?action=guardar-producto" method="POST">
            <div class="form-group">
                <label>Nombre de la prenda</label>
                <input type="text" name="nombre" placeholder="Ej: Chaqueta Jean Custom" required>
            </div>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div class="form-group">
                    <label>Precio (COP)</label>
                    <input type="number" name="precio" placeholder="95000" step="500" required>
                </div>
                <div class="form-group">
                    <label>Stock</label>
                    <input type="number" name="stock" placeholder="12" required>
                </div>
            </div>

            <div class="form-group">
                <label>Categoría</label>
                <select name="categoria_id" required>
                    <option value="1">Camisas / Camisetas</option>
                    <option value="2">Pantalones</option>
                    <option value="3">Chaquetas / Abrigos</option>
                </select>
            </div>

            <div class="form-group">
                <label>Ruta de la Imagen</label>
                <input type="text" name="imagen_url" placeholder="/Moon_essence/public/img/producto.jpg">
            </div>

            <button type="submit" class="btn-add-carrito btn-exito">Publicar Producto</button>
        </form>
    </div>

    <!-- LISTADO Y ACCIONES CRUD (READ, UPDATE, DELETE) -->
    <div class="panel-box">
        <h4>Inventario de Tu Tienda</h4>
        <table>
            <thead>
                <tr>
                    <th>Prenda</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($misProductos)): ?>
                    <tr>
                        <td colspan="4" style="text-align: center;">No tienes productos registrados aún.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($misProductos as $prod): ?>
                        <tr>
                            <td><?= htmlspecialchars($prod['nombre']) ?></td>
                            <td>$<?= number_format($prod['precio'], 0, ',', '.') ?></td>
                            <td><?= $prod['stock'] ?> uds</td>
                            <td>
                                <a href="/Moon_essence/public/index.php?action=editar-producto&id=<?= $prod['id'] ?>" 
                                   style="color: var(--color-neon-claro); margin-right: 10px;">Editar</a>
                                <a href="/Moon_essence/public/index.php?action=eliminar-producto&id=<?= $prod['id'] ?>" 
                                   onclick="return confirm('¿Seguro de eliminar este producto?')" 
                                   style="color: #ff4d4d;">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>