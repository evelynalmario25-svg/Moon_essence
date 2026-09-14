<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <a href="/Moon_essence/public/index.php?action=admin-dashboard">Panel Admin</a>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moon Essence</title>
    <link rel="stylesheet" href="/Moon_essence/public/css/style.css">
</head>
<body>
    <header>
    <div class="logo">
        <a href="/Moon_essence/public/index.php" style="text-decoration: none; color: inherit;">
            MOON<span>ESSENCE</span>
        </a>
    </div>

    <nav>
        <a href="/Moon_essence/public/index.php" class="<?= ($_GET['action'] ?? '') == 'index' ? 'active' : '' ?>">Mostrador</a>
        
        <!-- Enlace al Panel Admin alineado con el diseño elegante -->
        <a href="/Moon_essence/public/index.php?action=admin-dashboard" class="<?= ($_GET['action'] ?? '') == 'admin-dashboard' ? 'active' : '' ?>">
            Panel Admin
        </a>

        <a href="/Moon_essence/public/index.php?action=panel-emprendedor">Mi Emprendimiento</a>
        <a href="#">Carrito (2)</a>

        <?php if (isset($_SESSION['usuario_id'])): ?>
            <a href="/Moon_essence/public/index.php?action=logout">Cerrar Sesión</a>
        <?php else: ?>
            <a href="/Moon_essence/public/index.php?action=login">Iniciar Sesión</a>
            <a href="/Moon_essence/public/index.php?action=register" class="btn-header-gold">Registro</a>
        <?php endif; ?>
    </nav>
</header>
    <div class="container">