<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moon Essence</title>
    <link rel="stylesheet" href="/Moon_essence/public/css/style.css">
</head>
<body>
    <header>
        <div class="logo">Moon<span>Essence</span></div>
        <nav>
            <a href="/Moon_essence/public/index.php" class="active">Mostrador</a>
            <a href="/Moon_essence/public/index.php?action=panel-emprendedor">Mi Emprendimiento</a>
            <a href="#carrito-checkout">Carrito (2)</a>

            <?php if (isset($_SESSION['usuario_id'])): ?>
                <span style="color: var(--color-neon-claro); margin-left: 20px;">
                    Hola, <?= htmlspecialchars($_SESSION['nombre']) ?>
                </span>
                <a href="/Moon_essence/public/index.php?action=logout" style="color: #ff4d4d;">Salir</a>
            <?php else: ?>
                <a href="/Moon_essence/public/index.php?action=login">Iniciar Sesión</a>
                <a href="/Moon_essence/public/index.php?action=register" class="btn-exito" style="padding: 6px 12px; border-radius: 4px; text-decoration: none;">Registro</a>
            <?php endif; ?>
        </nav>
    </header>
    <div class="container">