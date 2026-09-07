<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../app/controllers/ProductoController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

$action = $_GET['action'] ?? 'index';

$authController = new AuthController();
$productoController = new ProductoController();

switch ($action) {
    case 'login':
        $authController->showLogin();
        break;
    case 'do-login':
        $authController->login();
        break;
    case 'register':
        $authController->showRegister();
        break;
    case 'do-register':
        $authController->register();
        break;
    case 'logout':
        $authController->logout();
        break;

    // RUTAS EXCLUSIVAS EMPRENDEDOR (CRUD)
    case 'panel-emprendedor':
        $productoController->panelEmprendedor();
        break;
    case 'guardar-producto':
        $productoController->guardar();
        break;
    case 'editar-producto':
        $productoController->editar();
        break;
    case 'actualizar-producto':
        $productoController->actualizar();
        break;
    case 'eliminar-producto':
        $productoController->eliminar();
        break;

    default:
        $productoController->index();
        break;
}