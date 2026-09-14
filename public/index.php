<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Carga de controladores
require_once __DIR__ . '/../app/controllers/ProductoController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/AdminController.php';

// Obtener la acción solicitada en la URL
$action = $_GET['action'] ?? 'index';

// Instanciar los controladores
$authController = new AuthController();
$productoController = new ProductoController();
$adminController = new AdminController();

// Enrutador principal
switch ($action) {
    case 'admin-dashboard':
        $adminController->dashboard();
        break;

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

    default:
        $productoController->index();
        break;
}