<?php
require_once __DIR__ . '/../config/conexion.php';

class Usuario {
    
    // Registrar un nuevo usuario en la base de datos
    public static function registrar($nombre, $email, $password, $rol = 'cliente') {
        $db = Database::getConnection();
        
        // Encriptar la contraseña antes de guardarla
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $db->prepare("INSERT INTO usuarios (nombre, email, password, rol) VALUES (:nombre, :email, :password, :rol)");
        return $stmt->execute([
            ':nombre'   => $nombre,
            ':email'    => $email,
            ':password' => $passwordHash,
            ':rol'      => $rol
        ]);
    }

    // Buscar un usuario por su email
    public static function obtenerPorEmail($email) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}