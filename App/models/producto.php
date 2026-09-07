<?php
require_once __DIR__ . '/../config/conexion.php';

class Producto {

    // Obtener todos los productos para el catálogo general
    public static function obtenerTodos() {
        $db = Database::getConnection();
        $stmt = $db->query("SELECT p.*, t.handle_tienda 
                            FROM productos p 
                            JOIN tiendas t ON p.tienda_id = t.id 
                            WHERE p.estado = 'aprobado'
                            ORDER BY p.id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener solo los productos de la tienda del emprendedor
    public static function obtenerPorTienda($usuarioId) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT p.*, c.nombre as categoria_nombre 
                              FROM productos p
                              JOIN tiendas t ON p.tienda_id = t.id
                              LEFT JOIN categorias c ON p.categoria_id = c.id
                              WHERE t.usuario_id = :usuario_id
                              ORDER BY p.id DESC");
        $stmt->execute([':usuario_id' => $usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un producto por ID verificando propiedad
    public static function obtenerPorIdYUsuario($id, $usuarioId) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT p.* 
                              FROM productos p 
                              JOIN tiendas t ON p.tienda_id = t.id 
                              WHERE p.id = :id AND t.usuario_id = :usuario_id");
        $stmt->execute([':id' => $id, ':usuario_id' => $usuarioId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Obtener la ID de la tienda perteneciente al usuario
    public static function obtenerTiendaIdPorUsuario($usuarioId) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT id FROM tiendas WHERE usuario_id = :usuario_id");
        $stmt->execute([':usuario_id' => $usuarioId]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res ? $res['id'] : null;
    }

    // Insertar un nuevo producto
    public static function crear($nombre, $precio, $stock, $categoriaId, $imagenUrl, $tiendaId) {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO productos (nombre, precio, stock, categoria_id, imagen_bg, tienda_id, estado) 
                              VALUES (:nombre, :precio, :stock, :cat, :imagen, :tienda, 'aprobado')");
        return $stmt->execute([
            ':nombre' => $nombre,
            ':precio' => $precio,
            ':stock'  => $stock,
            ':cat'    => $categoriaId,
            ':imagen' => $imagenUrl,
            ':tienda' => $tiendaId
        ]);
    }

    // Actualizar producto asegurando pertenencia
    public static function actualizar($id, $nombre, $precio, $stock, $categoriaId, $imagenUrl, $usuarioId) {
        $db = Database::getConnection();
        $stmt = $db->prepare("UPDATE productos p
                              JOIN tiendas t ON p.tienda_id = t.id
                              SET p.nombre = :nombre, p.precio = :precio, p.stock = :stock, 
                                  p.categoria_id = :cat, p.imagen_bg = :imagen 
                              WHERE p.id = :id AND t.usuario_id = :usuario_id");
        return $stmt->execute([
            ':id'         => $id,
            ':nombre'     => $nombre,
            ':precio'     => $precio,
            ':stock'      => $stock,
            ':cat'        => $categoriaId,
            ':imagen'     => $imagenUrl,
            ':usuario_id' => $usuarioId
        ]);
    }

    // Eliminar producto asegurando pertenencia
    public static function eliminar($id, $usuarioId) {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE p FROM productos p
                              JOIN tiendas t ON p.tienda_id = t.id
                              WHERE p.id = :id AND t.usuario_id = :usuario_id");
        return $stmt->execute([':id' => $id, ':usuario_id' => $usuarioId]);
    }
}