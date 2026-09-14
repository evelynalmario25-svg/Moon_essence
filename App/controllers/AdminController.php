<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../config/conexion.php';

class AdminController {

    public function dashboard() {
        // (Opcional) Puedes verificar si el usuario es administrador
        /*
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
            header("Location: /Moon_essence/public/index.php?action=login");
            exit;
        }
        */

        $db = Database::getConnection();

        // Obtener total de productos
        $stmtProd = $db->query("SELECT COUNT(*) as total FROM productos");
        $totalProductos = $stmtProd->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        // Obtener total de categorías (o tiendas/emprendimientos)
        $stmtCat = $db->query("SELECT COUNT(*) as total FROM categorias");
        $totalCategorias = $stmtCat->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        // Cargar vista del dashboard
        require_once __DIR__ . '/../views/admin/dashboard.php';
    }
}