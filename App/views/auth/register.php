<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="panel-box" style="max-width: 450px; margin: 3rem auto;">
    <div class="seccion-titulo">
        <h3>Crear Cuenta</h3>
        <p>Únete a la comunidad de moda independiente</p>
    </div>

    <?php if (isset($error)): ?>
        <p style="color: #ff4d4d; margin-bottom: 1rem;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="/Moon_essence/public/index.php?action=do-register" method="POST">
        <div class="form-group">
            <label>Nombre Completo</label>
            <input type="text" name="nombre" required placeholder="Tu nombre">
        </div>
        <div class="form-group">
            <label>Correo Electrónico</label>
            <input type="email" name="email" required placeholder="correo@ejemplo.com">
        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="password" required placeholder="••••••••">
        </div>
        <div class="form-group">
            <label>Tipo de Cuenta</label>
            <select name="rol">
                <option value="cliente">Cliente (Comprador)</option>
                <option value="emprendedor">Emprendedor (Diseñador/Tienda)</option>
            </select>
        </div>
        <button type="submit" class="btn-add-carrito btn-exito">Crear Cuenta</button>
    </form>

    <p style="margin-top: 1.5rem; text-align: center; font-size: 0.9rem;">
        ¿Ya tienes cuenta? <a href="/Moon_essence/public/index.php?action=login" style="color: var(--color-neon-claro)">Inicia sesión</a>
    </p>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>