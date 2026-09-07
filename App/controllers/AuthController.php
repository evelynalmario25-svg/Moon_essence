<?php
require_once __DIR__ . '/../models/Usuario.php';

class AuthController {

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Mostrar formulario de Login
    public function showLogin() {
        require_once __DIR__ . '/../views/auth/login.php';
    }

    // Procesar el Login
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email    = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');

            $usuario = Usuario::obtenerPorEmail($email);

            if ($usuario && password_verify($password, $usuario['password'])) {
                // Credenciales correctas: Guardar sesión
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['nombre']     = $usuario['nombre'];
                $_SESSION['rol']        = $usuario['rol'];

                header("Location: /Moon_essence/public/index.php");
                exit;
            } else {
                $error = "Correo o contraseña incorrectos.";
                require_once __DIR__ . '/../views/auth/login.php';
            }
        }
    }

    // Mostrar formulario de Registro
    public function showRegister() {
        require_once __DIR__ . '/../views/auth/register.php';
    }

    // Procesar el Registro
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre   = trim($_POST['nombre'] ?? '');
            $email    = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');
            $rol      = $_POST['rol'] ?? 'cliente';

            if (!empty($nombre) && !empty($email) && !empty($password)) {
                if (Usuario::registrar($nombre, $email, $password, $rol)) {
                    header("Location: /Moon_essence/public/index.php?action=login&success=1");
                    exit;
                }
            }
            
            $error = "Error al registrar el usuario. Intenta nuevamente.";
            require_once __DIR__ . '/../views/auth/register.php';
        }
    }

    // Cerrar sesión
    public function logout() {
        session_destroy();
        header("Location: /Moon_essence/public/index.php");
        exit;
    }
}