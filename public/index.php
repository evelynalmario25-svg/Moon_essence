<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cargar controladores
require_once __DIR__ . '/../app/controllers/ProductoController.php';
require_once __DIR__ . '/../app/controllers/AdminController.php';

$productoController = new ProductoController();
$adminController = new AdminController();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        $productoController->index();
        break;

    case 'admin-dashboard':
        $adminController->dashboard();
        break;

    case 'reportes':
        $adminController->reportes();
        break;

    case 'panel-emprendedor':
        $productoController->panelEmprendedor();
        break;

    case 'login':
        // Vista o acción de login
        require_once __DIR__ . '/../app/views/auth/login.php';
        break;

    case 'register':
        // Vista o acción de registro
        require_once __DIR__ . '/../app/views/auth/register.php';
        break;

    case 'logout':
        session_destroy();
        header('Location: /Moon_essence/public/index.php');
        exit;

    default:
        $productoController->index();
        break;
}