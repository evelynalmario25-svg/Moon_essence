<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="panel-box" style="max-width: 450px; margin: 3rem auto;">
    <div class="seccion-titulo">
        <h3>Iniciar Sesión</h3>
        <p>Ingresa a tu cuenta de Moon Essence</p>
    </div>

    <?php if (isset($_GET['success'])): ?>
        <p style="color: var(--exito); margin-bottom: 1rem;">¡Registro exitoso! Ahora puedes iniciar sesión.</p>
    <?php endif; ?>

    <?php if (isset($error)): ?>
        <p style="color: #ff4d4d; margin-bottom: 1rem;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="/Moon_essence/public/index.php?action=do-login" method="POST">
        <div class="form-group">
            <label>Correo Electrónico</label>
            <input type="email" name="email" required placeholder="correo@ejemplo.com">
        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="password" required placeholder="••••••••">
        </div>
        <button type="submit" class="btn-add-carrito">Ingresar</button>
    </form>
    
    <p style="margin-top: 1.5rem; text-align: center; font-size: 0.9rem;">
        ¿No tienes cuenta? <a href="/Moon_essence/public/index.php?action=register" style="color: var(--color-neon-claro)">Regístrate aquí</a>
    </p>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>